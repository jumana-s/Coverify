<?php

define('DB_SERVER', 'localhost');
define('DB_PORT', '3306');
define('DB_USERNAME', 'moham12y');
define('DB_PASSWORD', '');
define('DB_NAME', 'moham12y_db1');

$connection = mysqli_connect(
    DB_SERVER,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME,
    DB_PORT
);

if (!$connection) {
    die('Could not connect. ' . mysqli_connect_error());
}
