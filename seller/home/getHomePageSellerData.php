<?php
require "connection.php";


$id = mysqli_real_escape_string($connect,$id);
$query = <<<EOF
    SELECT(SELECT COUNT(*)  FROM `product` WHERE STATUS = "SELLING") AS totalProductSelling,
    (SELECT COUNT(*) FROM `product`) AS totalProduct
EOF;

$result = $connect->query($query);

//Class product
class Product{
    function Product($totalProductSelling,$totalProduct){
        $this->totalProductSelling = $totalProductSelling;
        $this->totalProduct = $totalProduct;
    }

}

$listProduct = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($listProduct, new Product($row['totalProductSelling'], $row['totalProduct']));
}

echo json_encode($listProduct);
