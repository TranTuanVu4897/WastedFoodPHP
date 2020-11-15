<?php
require "../connection.php";
$sql="select count(*) as total from product where seller_id = 2001
";
$result=mysqli_query($connect,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
