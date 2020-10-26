<?php
require "../connection.php";

$seller_id = "2001";
$name = "nam";
$image = null;
$start_time = "14-10-2020 06:06:07";
$start_time = date('YYYY-MM-DD HH:MI:SS',strtotime($start_time));


$end_time = "2018-11-23 15:54:01";


$original_price = "1";
$sell_price = "1";
$original_quantity = "1";
$remain_quantity = "1";
$description = "1";

$sell_date = "2010-03-21 15:54:01";
// $sell_date = date('d-m-y',strtotime($sell_date));
$status = "selling";


$modified_date = "2010-03-21 15:54:01";
$modified_date = date('Y-m-d H:i:s',strtotime($modified_date));

//Thêm đoạn đóng mở ngoặc vào từng value. thế thôi.
$query = "INSERT INTO `product` (`seller_id`,`name`,`image`,`start_time`,`end_time`,`original_price` , `sell_price` , `original_quantity` , `remain_quantity` , `description` , `sell_date` , `status` ) VALUES ('$seller_id','$name','$image', '$start_time' ,'$end_time', '$original_price' , '$sell_price' , '$original_quantity' , '$remain_quantity' , '$description' , '$sell_date' , '$status' )";


//chỗ này để trigger bug
//$result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);


if(mysqli_query($connect,$query))
{

echo " Succesfully update";

}
else
{
echo "Try again Later ..." .mysqli_error($connect) ;
}
