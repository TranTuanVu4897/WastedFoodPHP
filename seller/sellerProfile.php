<?php
require "../connection.php";

//get username and password from url parameters
$account_id = $_REQUEST['account_id'];

// $username = "test";
// $password = "test";

//remove special string from parameters
$account_id = mysqli_real_escape_string($connect, $account_id);

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