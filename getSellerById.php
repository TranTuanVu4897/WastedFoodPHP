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
        $this->AccountId = $account_id;
        $this->Name = $name;
        $this->Image = $image;
        $this->Address = $address;
        $this->Latitude = $latitude;
        $this->Longitude = $longitude;
        $this->Description = $description;
    }

}

$listProcution = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($listProcution, new Seller($row['account_id'], $row['name'], $row['image'], $row['address'], $row['latitude'], $row['longitude'], $row['longitude']));
}

echo json_encode($listProcution);
