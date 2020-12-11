<?php
require "../connection.php";
$product_id = $_GET['product_id'];
$sql="select count(*) as total from `order` where `product_id` = '$product_id' AND `status` = 'BUYING'
";
$result=mysqli_query($connect,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];