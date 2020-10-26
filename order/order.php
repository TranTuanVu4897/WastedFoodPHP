<?php 
require "../connection.php";

$buyer_id = $_POST["buyer"];
$product_id = $_POST["product"];
$quantity = $_POST["quantity"];
$status = $_POST["status"];
$total_cost = $_POST["total_cost"];
//buyer order not yet need
// $buyer_rating = $_POST["buyer_rating"];
// $buyer_comment = $_POST["buyer_comment"];


$query = "INSERT INTO `order` ( `buyer_id`, `product_id`, `quantity`, `status`, `total_cost`, `buyer_rating`, `buyer_comment`) VALUES ( '$buyer_id', '$product_id', '$quantity', '$status', '$total_cost', NULL, NULL);";

// Show bug
//$result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);

if(mysqli_query($connect,$query)){
    echo "SUCCESS";
}else{
    echo "ERROR";
}

