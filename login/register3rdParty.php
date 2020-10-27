<?php
require "../connection.php";

//get 3rd party id


$thirdPartyId = $_REQUEST["thirdPartyId"];

$account_id  = $_REQUEST["account_id"];
$name = $_REQUEST["name"];
$phone = $_REQUEST["phone"];
$image = $_REQUEST["image"];
$dob = $_REQUEST["dob"];
$gender = $_REQUEST["gender"];
$email = $_REQUEST["email"];


$thirdPartyId = mysqli_real_escape_string($connect,$thirdPartyId);
$account_id = mysqli_real_escape_string($connect, $id);
$name = mysqli_real_escape_string($connect, $name);
$image = mysqli_real_escape_string($connect, $image);
$dob = mysqli_real_escape_string($connect, $image);
$gender = mysqli_real_escape_string($connect, $gender);
$email = mysqli_real_escape_string($connect, $email);

$thirdPartyId = $_REQUEST['thirdPartyId'];
$image = $_REQUEST['account_id'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];


$query1 = "SELECT `id` FROM `account` WHERE `third_party_id` = '$thirdPartyId'";
$result = $connect->query($query1);



//3rd party id exist -> login
if($result->num_rows<=0){
    //return OK
    echo "OK";
    exit();
}

else{
    //3rd party id not exist -> register
    $query2 = "SELECT COUNT(`id`) FROM `account`";
    $result = $connect->query($query2);
    $count = $row[0];
    //take count for get number
    $username = "test" . $count;
    $id = "30" . $count;

    //insert into account
    $query3 = "INSERT INTO `account` (`id`, `role_id`, `username`, `password`, `phone`, `third_party_id`, `email`, `created_date`, `is_active`, `modified_date`)
    VALUES ('$id', '3', '$username', '$username', '011223345', $thirdPartyId, $email, current_timestamp(), '1', current_timestamp());";
    $result = $connect->query($query3);
    //insert into buyer
    $query4 = "INSERT INTO `buyer` (`account_id`, `date_of_birth`, `image`, `gender`, `modified_date`, `name`)
    VALUES ('$id', '$dob', ''$image'', NULL, current_timestamp(), '$name')";
    $result = $connect->query($query4);
}
?>
