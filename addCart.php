<?php

// checking the request receive is a POST, if not we redirect it back to the product page.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: product.php");
    exit();
}

// Checking if the POST request has the quantity input
if (!isset($_POST['quantity'], $_POST['product_id'])) {
    header("Location: products.php");
    exit();
}

// include the database file so we can make a connection to the database.
require_once 'database.php';
session_start();

// sanitize all inputs
$productId = (int)$_POST['product_id'];
$quantity = (int)$_POST['quantity'];
$userId = (int)$_SESSION['id'];

// checking if the inputs are empty
if (empty($productId) || empty($quantity)) {
    $_SESSION['error'] = 'Missing inputs.';
    header("Location: products.php");
    exit();
}

//check if product already exists
$result = $connection->query("SELECT * FROM Cart WHERE userId=$userId AND productId=$productId");

if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {
    $sum = $quantity + $row["quantity"];
    $connection->query("UPDATE Cart SET quantity=$sum WHERE userId=$userId AND productId=$productId");
}
else {
     $connection->query("INSERT INTO Cart VALUES ($userId, $productId, $quantity)");
}

header("Location: products.php");
exit();