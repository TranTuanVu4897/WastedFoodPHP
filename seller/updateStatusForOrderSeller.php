<?php
require "../connection.php";

$status = $_POST["status"];
$id = $_POST["id"];

$query = "update `order` set status = '$status' where id = '$id'";

if(mysqli_query($connect,$query))
{

echo " Succesfully update";

}
else
{
echo $connect->error;
}

?>