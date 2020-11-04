<?php
require "../connection.php";

//$seller_id = $_REQUEST["seller_id"];

//query
$query = "SELECT order.id,order.buyer_id, buyer.name  as buyer_name, product.name  ,order.product_id,order.quantity , order.status  , order.total_cost,
order.buyer_rating , order.buyer_comment , order.modified_date
from `order` inner JOIN product
on  product_id = product.id
INNER JOIN seller
on product.seller_id = seller.account_id
INNER JOIN buyer
on order.buyer_id = buyer.account_id
where seller.account_id = 2001";

$result = $connect->query($query);

//Class order
class Order
{
    function Order($id, $buyer_id, $buyerName, $nameProduct, $product_id, $quantity, $status, $total_cost, $buyer_rating, $buyer_comment, $modified_date)
    {
        $this->id = $id;
        $this->buyer_id = $buyer_id;
        $this->buyerName = $buyerName;
        $this->nameProduct = $nameProduct;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->status = $status;
        $this->total_cost = $total_cost;
        $this->buyer_rating = $buyer_rating;
        $this->buyer_comment = $buyer_comment;
        $this->modified_date = $modified_date;
    }
}

//Create array
$listOrder = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($listOrder, new Order($row['id'], $row['buyer_id'], $row['buyer_name']  , $row['name'] ,  $row['product_id'], $row['quantity'], $row['status'], $row['total_cost'], $row['buyer_rating'], $row['buyer_comment'], $row['modified_date']));
}

//change array to json
echo json_encode($listOrder);





