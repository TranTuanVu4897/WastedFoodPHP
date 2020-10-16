<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "wasted_food_database";

$connect = mysqli_connect($server, $username, $password, $dbname);
mysqli_query($connect, "SET NAMES 'utf8'");

//Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}