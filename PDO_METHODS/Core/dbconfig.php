<?php
// Setting up Variables to establish connection to Database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "abarquez";
$dsn = "mysql:host={$host};dbname={$dbname}";
// Connecting SQL files with Database using PDO's
$pdo = new PDO($dsn, $user, $password);
$pdo -> exec("SET time_zone = '+08:00';");

?>