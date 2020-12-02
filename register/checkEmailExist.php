<?php
require "../connection.php";
require "../model/buyer.php";

//get 3rd party id


$email = $_POST["email"];

$phone = mysqli_real_escape_string($connect,$email);

$query = "SELECT email from account WHERE email = '$email'";
$result = $connect->query($query);

if($result->num_rows<=0){
    echo 'notExist';
} else{
    echo 'exist';
}


?>
