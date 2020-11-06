<?php
//This is for server on heroku
$server = "p1us8ottbqwio8hv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "opz3hmxpxk0vfl21";
$password = "swc44g1p3ciko317";
$dbname = "eaur5hgdarhpvk2e";
$port = "3306";


// $server = "localhost";
// $username = "root";
// $password = "";
// $dbname = "wasted_food_database";
// $port = "3306";

$connect = mysqli_connect($server, $username, $password, $dbname, $port);

mysqli_query($connect, "SET NAMES 'utf8'");

//Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}