<?php
require "../connection.php";

$phone = $_GET['phone'];
$sql="select count(*) as total from `account` where `phone` = $phone";
$result=mysqli_query($connect,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];