<?php
require "../connection.php";

$seller_id = $_REQUEST["seller_id"];
$seller = mysqli_real_escape_string($connect,$seller_id);

//query
$query = "select `id`,`seller_id`,`name`, `image`,`start_time`, `end_time`, `original_price`, `sell_price`, 
`original_quantity`, `remain_quantity`, `description`, `sell_date`, `status`, `shippable` 
from product where seller_id = '$seller_id' order BY sell_date DESC ";

//$result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);
$result = $connect->query($query);

//Class product
class Product1
{
    function Product1($id, $seller_id, $name, $image, $start_time, $end_time, $original_price, $sell_price, $original_quantity, $remain_quantity, $description, $sell_date, $status, $shippable)
    {
        $this->Id = $id;
        $this->SellerId = $seller_id;
        $this->Name = $name;
        $this->Image = $image;
        $this->StartTime = $start_time;
        $this->EndTime = $end_time;
        $this->OriginalPrice = $original_price;
        $this->SellPrice = $sell_price;
        $this->OriginalQuantity = $original_quantity;
        $this->RemainQuantity = $remain_quantity;
        $this->Description = $description;
        $this->SellDate = $sell_date;
        $this->Status = $status;
        $this->Shippable = $shippable;
    }
}

//Create array
$listProduction = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($listProduction, new Product1($row['id'], $row['seller_id'], $row['name'], $row['image'], $row['start_time'], $row['end_time'], $row['original_price'], $row['sell_price'], $row['original_quantity'], $row['remain_quantity'], $row['description'], $row['sell_date'], $row['status'], $row['shippable']));
}

//change array to json
echo json_encode($listProduction);

// //get Seller
// $query1 = "SELECT `account_id`,`name`,`image`,`address`, `latitude`, `longitude`, `description` 
// FROM `seller` WHERE `account_id` = $seller_id";

// $result = $connect->query($query1);

// class Seller{
//     function Seller($id, $name, $image, $address, $latitude, $longitude, $description){
//         $this->Id = $id;
//         $this->Name = $name;
//         $this->Image = $image;
//         $this->Address = $address;
//         $this->Latitude = $latitude;
//         $this->Longitude = $longitude;
//         $this->Description = $description;
//     }
// }
// //create array seller
// $seller = array();
// while($row = mysqli_fetch_assoc($result)) {
//     array_push($seller, new Seller($row['account_id'], $row['name'], $row['image'], $row['address'], $row['latitude'], $row['longitude'], $row['description']));
// }
// echo json_encode($seller);




