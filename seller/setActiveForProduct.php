<?php
require "../connection.php";

$status = $_POST["status"];
$seller_id = $_POST["seller_id"];
$id = $_POST["id"];

$query = "update Product set 
status = '$status'
where seller_id = '$seller_id'
and id = '$id'";

if(mysqli_query($connect,$query))
{

echo " Succesfully update";

}
else
{
echo "Try again Later ..." ;
}

?>