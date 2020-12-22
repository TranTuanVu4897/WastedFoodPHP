<?php
require "../connection.php";
//123
$seller_id = $_POST["seller_id"];
$id = $_POST["id"];
$name = $_POST["name"];
$originalPrice = $_POST["originalPrice"];
$sellPrice = $_POST["sellPrice"];
$openTime = $_POST["openTime"];
$closeTime = $_POST["closeTime"];
$remainQuantity = $_POST["remainQuantity"];
$image = $_POST["image"];
$quantity = $_POST["quantity"];



$query = "update `product` set 
`name` = '$name',
`original_Price` = '$originalPrice',
`sell_Price` = '$sellPrice',
`original_quantity` = '$quantity',
`remain_quantity` = '$remainQuantity' ";
if($image!=" ")
$query = $query . ",`image` = '$image'";
$query = $query .  " where seller_id = '$seller_id'
and id = '$id'";

$result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);

if(mysqli_query($connect,$query))
{

echo " Successfully update";

}
else
{
echo "Try again Later ..." ;
echo $connect->error;
}

?>