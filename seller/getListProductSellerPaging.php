<?php
require "../connection.php";

$seller_id = $_REQUEST["seller_id"];
$seller = mysqli_real_escape_string($connect, $seller_id);
$page = 1;
//query
$query = "select `id`,`seller_id`,`name`, `image`,`start_time`, `end_time`, `original_price`, `sell_price`, 
`original_quantity`, `remain_quantity`, `description`, `sell_date`, `status`, `shippable` 
from product where seller_id = '$seller_id' order BY sell_date DESC ";

if (!empty($_REQUEST['page'])) {
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    if (false === $page) {
        $page = 1;
    }
}

$items_per_page = 5;
$offset = ($page - 1) * $items_per_page;

//$result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);
$result = mysqli_query($connect, $query . ";");
$total_rows = $result->num_rows;
$total_pages = ceil($total_rows / $items_per_page);
if ($page <= $total_pages) {
    $query = $query . " LIMIT $offset ,$items_per_page;";
    $result = mysqli_query($connect, $query) or trigger_error("Query Failed! SQL: $query - Error: " . mysqli_error($connect), E_USER_ERROR);
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
} else {
    echo "end";
}
