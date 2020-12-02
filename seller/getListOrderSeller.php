<?php
require "../connection.php";

$seller_id = $_REQUEST["seller_id"];
$product_id = $_REQUEST["product_id"];
$order_status = $_REQUEST["order_status"];


//query

$query = "  SELECT `order`.id,
                `order`.`buyer_id`,
                `buyer`.`name` AS `buyer_name`,
                `product`.`name`,
                `order`.`product_id`,
                `order`.`quantity`,
                `order`.`status`,
                `order`.`total_cost`,
                `order`.`buyer_rating`,
                `order`.`buyer_comment`,
                `order`.`modified_date`,
                `buyer`.`image`,
                `account`.`firebase_UID`,
                `product`.`name` AS 'product_name'
            FROM `order`
            INNER JOIN `product` 
                    ON `product_id` = `product`.`id`
            INNER JOIN `seller`
                    ON `product`.`seller_id` = `seller`.`account_id`
            INNER JOIN `buyer` 
                    ON `order`.`buyer_id` = `buyer`.`account_id`
            INNER JOIN `account` 
            		ON `order`.`buyer_id` = `account`.`id`
            WHERE
                    `seller`.`account_id` = $seller_id 
                    AND `product_id` = $product_id 
                    AND `order`.`status` = '$order_status'";

$result = $connect->query($query);

//Class order
class Order
{
    function Order($id, $buyer_id, $buyerName, $nameProduct, $product_id, $quantity, $status, $total_cost, $buyer_rating, $buyer_comment, $image , $firebase_UID , $product_name)
    {
        $this->id = $id;
        $this->buyer_id = $buyer_id;
        $this->buyer_name = $buyerName;
        $this->name_product = $nameProduct;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->status = $status;
        $this->total_cost = $total_cost;
        $this->buyer_rating = $buyer_rating;
        $this->buyer_comment = $buyer_comment;
        $this->buyer_avatar = $image;
        $this->firebase_UID = $firebase_UID;
        $this->product_name = $product_name;
    }
}

//Create array
$listOrder = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($listOrder, new Order($row['id'], $row['buyer_id'], $row['buyer_name'], $row['name'],  $row['product_id'], $row['quantity'], $row['status'], $row['total_cost'], $row['buyer_rating'], $row['buyer_comment'], $row['image'] , $row['firebase_UID'], $row['product_name'] ));
}

//change array to json
echo json_encode($listOrder);
