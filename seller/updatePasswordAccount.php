<?php
require "../connection.php";

$password = $_POST["password"];
$id = $_POST["id"];

$query = "update account set 
password = '$password'
where id = '$id'";

if(mysqli_query($connect,$query))
{

echo " Succesfully update";

}
else
{
echo "Try again Later ..." ;
}
?>