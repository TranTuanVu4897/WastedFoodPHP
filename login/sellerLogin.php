<?php
require "../connection.php";

//get username and password from url parameters
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

// $username = "test";
// $password = "test";

//remove special string from parameters
$username = mysqli_real_escape_string($connect, $username);
$password = mysqli_real_escape_string($connect, $password);

//sql string get info
$query = "SELECT `id`,`role_id` FROM `account` WHERE `username` = '$username' AND `password` = '$password'";

//check exist an account
//execute query
$result = $connect->query($query);

if($result->num_rows<=0){
    //return error
    echo "not exist account";
    $connect->close();
    exit();
}

//get role id
$role_id = 0;
$id = 0;

//get role_id and id
while($row = mysqli_fetch_row($result)){
    $role_id = $row[1];
    $id = $row[0];
}

if($role_id!=2){
    //return error
    echo "not match role";
    $connect->close();
    exit();
}

$query = "SELECT `account_id`,`name`,`image`,`address`,`latitude`,`longitude`,`description` FROM `seller` WHERE `account_id` = $id";
$result = $connect->query($query);


class Seller{
    function Seller($account_id,$name,$image,$address,$latitude,$longitude,$description){
        $this->account_id = $account_id;
        $this->name = $name;
        $this->image = $image;
        $this->address = $address;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->description = $description;
    }
}

$listSeller = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($listSeller, new Seller($row['account_id'],$row['name'],$row['image'],$row['address'],$row['latitude'],$row['longitude'],$row['description']));
}
//return json object if not error
echo json_encode($listSeller);
$connect->close();
?>