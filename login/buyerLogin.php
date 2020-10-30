<?php
require "../connection.php";
require "../model/buyer.php";

//get username and password from url parameters
$phone = $_REQUEST['phone'];
$password = $_REQUEST['password'];

// $username = "test";
// $password = "test";

//remove special string from parameters
$phone = mysqli_real_escape_string($connect, $phone);
$password = mysqli_real_escape_string($connect, $password);

//sql string get info
$query = "SELECT `id`,`role_id`,`is_active` FROM `account` WHERE `phone` = '$phone' AND `password` = '$password'";

//check exist an account
//execute query
$result = $connect->query($query);

if($result->num_rows<=0){
    //return error
    echo "not exist account";
    exit();
}

//get role id
$role_id = 0;
$id = 0;
$active = true;

//get role_id and id
while($row = mysqli_fetch_row($result)){
    
    $role_id = $row[1];
    $id = $row[0];
    $active = $row[2];
}

if($role_id!=3){
    //return error
    echo "not match role";
    exit();
}

if(!$active){
    //return error
    echo "account is locked";
    exit();
}

$query = "SELECT `account_id`,`date_of_birth`,`name`,`image`,`gender` FROM `buyer` WHERE `account_id` = $id";
$result = $connect->query($query);


$listBuyer = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($listBuyer, new Buyer($row['account_id'],$row['name'],$row['date_of_birth'],$row['image'],$row['gender']));
}
//return json object if not error
echo json_encode($listBuyer);

?>