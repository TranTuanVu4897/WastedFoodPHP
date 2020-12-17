<?php
require "../connection.php";

$remain_quantity = $_POST["remain_quantity"];
$id = $_POST["id"];
// $remain_quantity = 7;
// $id = 1;

$query = "update `product` set `remain_quantity` = '$remain_quantity' where `id` = '$id'";

$result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query2 - Error: ".mysqli_error($connect), E_USER_ERROR);
if(mysqli_query($connect,$query))
{
echo " Succesfully update";
}
else
{
echo $connect->error;
}

?>