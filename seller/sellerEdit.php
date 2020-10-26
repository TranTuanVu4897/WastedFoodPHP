<?php
require "../connection.php";

$name = $_POST["username"];
$address = $_POST["address"];
$id = $_POST["id"];

$description = $_POST["description"];

//$name = "123";
//$address = "123 hoa lac";
//$id = 1;

//$description = "123";
//$email = "123@gmail.com";

$query = "update Seller set 
address = '$address',
name = '$name',
description = '$description'
where account_id = '$id'";

if(mysqli_query($connect,$query))
{

echo " Succesfully update";

}
else
{
echo "Try again Later ..." ;
}
?>