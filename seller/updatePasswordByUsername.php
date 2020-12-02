<?php
require "../connection.php";

$password = $_POST["password"];
$phone = $_POST["phone"];

$query = "update account set 
password = '$password'
where phone = '$phone'";

if(mysqli_query($connect,$query))
{

echo " Succesfully update";

}
else
{
echo "Try again Later ..." ;
}
?>