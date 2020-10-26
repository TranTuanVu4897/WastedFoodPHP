<?php
require "../connection.php";

$seller_id = $_REQUEST["seller_id"];

//query
$query = "select * from Product where seller_id = '$seller_id' ";

$result = $connect->query($query);

//Class product
class Product
{
    function Product($id, $seller_id, $name, $image, $start_time, $end_time, $original_price, $sell_price, $original_quantity, $remain_quantity, $description, $sell_date, $status, $shippable)
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
    array_push($listProduction, new Product($row['id'], $row['seller_id'], $row['name'], $row['image'], $row['start_time'], $row['end_time'], $row['original_price'], $row['sell_price'], $row['original_quantity'], $row['remain_quantity'], $row['description'], $row['sell_date'], $row['status'], $row['shippable']));
}

//change array to json
echo json_encode($listProduction);





