<?php
require "../connection.php";
$seller_id = $_GET['seller_id'];
$sql="select count(*) as total from product where seller_id = $seller_id
";
$result=mysqli_query($connect,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
