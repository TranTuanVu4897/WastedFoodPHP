<?php
require "connection.php";

// //sample place
// $lat = 21.0110168;
// $lng = 105.5182143;


// //sample distance
// $distance = 150; //$_REQUEST['distance']


// //escape special characters in variable
// $lat = mysqli_real_escape_string($connect, $lat);
// $lng = mysqli_real_escape_string($connect, $lng);
// $distance = mysqli_real_escape_string($connect, $distance);
$id = $_REQUEST['id'];
$id = mysqli_real_escape_string($connect,$id);
$query = <<<EOF
    SELECT `account_id`,`name`,`image`,`address`,`latitude`,`longitude`,`longitude`
    FROM seller
    WHERE `account_id` = $id
EOF;

$result = $connect->query($query);

//Class product
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

while ($row = mysqli_fetch_assoc($result)) {
    array_push($listSeller, new Seller($row['account_id'], $row['name'], $row['image'], $row['address'], $row['latitude'], $row['longitude'], $row['longitude']));
}

echo json_encode($listSeller);
