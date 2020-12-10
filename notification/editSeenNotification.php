<?php
require "../connection.php";
$receiver_id = "2001";
// $receiver_id = $_POST["receiver_id"];

$query = "update Notification set 
seen = TRUE
where receiver_id = '$receiver_id'";

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
