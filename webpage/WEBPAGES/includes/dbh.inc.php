<?php

/* Establishing connection with our server, user and database*/

$servername ="localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "herbs";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) { /*Condition applied in case connection failed*/
    die("Connection failed: " . mysqli_connect_error());
}
