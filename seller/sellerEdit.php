<?php
require "../connection.php";

// $name = $_POST["username"];
// $address = $_POST["address"];
// $id = $_POST["id"];
// $image = $_POST["image"];
// $description = $_POST["description"];

$name = "13";
$address = "123";
$id = "2003";
$image = " ";
$description = "â";

//$name = "123";
//$address = "123 hoa lac";
//$id = 1;

//$description = "123";
//$email = "123@gmail.com";

$query = "update `seller` set 
`address` = '$address',
`name` = '$name',
`description` = '$description' ";
if($image!=" ")
$query = $query . ",`image` = '$image'";

$query = $query . "where account_id = '$id'";

$result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);
if(mysqli_query($connect,$query))
{

echo " Succesfully update";

}
else
{
echo "Try again Later ..." ;

}
?>