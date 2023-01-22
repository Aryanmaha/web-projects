<?php
$dbname = 'travels';
$hostname = '127.0.0.1';
$username = 'root';
$password = '';

$pdo = new PDO('mysql:dbname='.$dbname.';host='.$hostname,$username,$password, 
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>