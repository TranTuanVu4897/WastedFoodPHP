<?php
require "../connection.php";

$seller_id = $_REQUEST["seller_id"];

$query = <<<EOF
    SELECT
    (
    SELECT
        COUNT(*)
    FROM
        `product`
    WHERE
    STATUS
    = "SELLING" AND `product`.`seller_id` = $seller_id
    ) AS totalProductSelling,
    (
    SELECT
        COUNT(*)
    FROM
        `product`
    WHERE
        `product`.`seller_id` = $seller_id
    ) AS totalProduct,
    (
    SELECT
        COUNT(*)
    FROM
        `order`
    INNER JOIN `product` ON `product_id` = `product`.`id`
    INNER JOIN `seller` ON `seller`.`account_id` = `product`.`seller_id`
    WHERE
        `seller`.`account_id` = $seller_id AND `order`.`status` = 'BUYING'
    ) AS totalOrderBuying,
    (
    SELECT
        COUNT(*)
    FROM
        `order`
    INNER JOIN `product` ON `product_id` = `product`.`id`
    INNER JOIN `seller` ON `seller`.`account_id` = `product`.`seller_id`
    WHERE
        `seller`.`account_id` = $seller_id AND `order`.`status` = 'SUCCESS'
    ) AS totalOrderSuccess,
    (
    SELECT
        COUNT(*)
    FROM
        `order`
    INNER JOIN `product` ON `product_id` = `product`.`id`
    INNER JOIN `seller` ON `seller`.`account_id` = `product`.`seller_id`
    WHERE
        `seller`.`account_id` = $seller_id AND `order`.`status` = 'CANCEL'
    ) AS totalOrderCancel,
    (
    SELECT
        COUNT(*)
    FROM
        `list_follow`
    WHERE
        `seller_id` = $seller_id
    ) AS totalFollower
EOF;

$result = $connect->query($query);

//Class product
class Product{
    function Product($totalProductSelling,$totalProduct,$totalOrderBuying,$totalOrderSuccess,$totalOrderCancel,$totalFollower){
        $this->totalProductSelling = $totalProductSelling;
        $this->totalProduct = $totalProduct;
        $this->totalOrderBuying = $totalOrderBuying;
        $this->totalOrderSuccess = $totalOrderSuccess;
        $this->totalOrderCancel = $totalOrderCancel;
        $this->totalFollower = $totalFollower;
    }

}


$listProduct = array();

while ($row = mysqli_fetch_assoc($result)) {
    $static = new Product($row['totalProductSelling'], $row['totalProduct'] ,$row['totalOrderBuying'], $row['totalOrderSuccess'] , $row['totalOrderCancel'], $row['totalFollower']) ;
    array_push($listProduct, new Product($row['totalProductSelling'], $row['totalProduct'] ,$row['totalOrderBuying'], $row['totalOrderSuccess'] , $row['totalOrderCancel'], $row['totalFollower']  ));
}

echo json_encode($static);
