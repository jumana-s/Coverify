<?php

// checking the request receive is a POST, if not we redirect it back to the login page.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register.php");
    exit();
}

// Checking if the POST request has the
if (!isset($_POST['username'], $_POST['password'])) {
    header("Location: register.php");
    exit();
}

// include the database file so we can make a connection to the database.
require_once 'database.php';
session_start();

// sanitize all inputs
$name = $connection->real_escape_string($_POST['username']);
$password = $connection->real_escape_string($_POST['password']);
$passwordConfirmation = $connection->real_escape_string($_POST['confirm-password']);

// checking if the name, email, password and confirm-password inputs are empty
if (empty($name) || empty($password) || empty($passwordConfirmation)) {
    $_SESSION['error'] = 'Missing inputs.';
    header("Location: register.php");
    exit();
}

// checking if the password input matches the password-confirmation input
if ($password !== $passwordConfirmation) {
    $_SESSION['error'] = 'Password does not match Password Confirmation.';
    header("Location: register.php");
    exit();
}

//validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase) {
    $_SESSION['error'] = 'Password needs to include an uppercase letter';
    header("Location: register.php");
    exit();
}
else if(!$lowercase){
    $_SESSION['error'] = 'Password needs to include a lowercase letter';
    header("Location: register.php");
    exit();
}
else if(!$number){
    $_SESSION['error'] = 'Password needs to include an number';
    header("Location: register.php");
    exit();
}
else if(!$specialChars){
    $_SESSION['error'] = 'Password needs to include a special character';
    header("Location: register.php");
    exit();
}
else if(strlen($password) < 8){
    $_SESSION['error'] = 'Password needs to be at least 8 characters';
    header("Location: register.php");
    exit();
}


// checking if an user with the email input already exists
$result = $connection->query("SELECT * FROM User WHERE username='$name'");
if ($result->num_rows > 0) {
    $_SESSION['error'] = 'User already exists.';
    header("Location: register.php");
    exit();
}

// hashing the input password
//$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// insert the user data into the users table
//$res = $connection->query("INSERT INTO User(username, password) VALUES ('$name', '$hashedPassword')");

$sql = "INSERT INTO User VALUES (NULL, '$name', '$password')";
if (mysqli_query($connection, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      header("Location: register.php");
	  exit();
}

// redirect the user to the login page
header("Location: login.php");
exit();
