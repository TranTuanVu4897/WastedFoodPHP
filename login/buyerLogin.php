<?php
require "../connection.php";

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
    $active = $row[3];
}

if($role_id!=3){
    //return error
    echo "not match role";
    exit();
}

if(!$role_id){
    //return error
    echo "account is locked";
    exit();
}

$query = "SELECT `account_id`,`date_of_birth`,`image`,`gender` FROM `buyer` WHERE `account_id` = $id";
$result = $connect->query($query);

class Buyer{
    function Buyer($account_id,$date_of_birth,$image,$gender){
        $this->account_id = $account_id;
        $this->date_of_birth = $date_of_birth;
        $this->image = $image;
        $this->gender = $gender;
    }
}

$listBuyer = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($listBuyer, new Buyer($row['account_id'],$row['date_of_birth'],$row['image'],$row['gender']));
}
//return json object if not error
echo json_encode($listBuyer);

?>