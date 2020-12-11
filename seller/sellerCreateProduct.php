<?php
require "../connection.php";

$seller_id = $_POST['seller_id'];
$name = $_POST['name'];

if (isset($_POST['image'])){

    $image = $_POST['image'];
}
else
{
    $image = null;
}
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$original_price = $_POST['original_price'];
$sell_price = $_POST['sell_price'];
$original_quantity = $_POST['original_quantity'];
$remain_quantity = $_POST['remain_quantity'];
$description = $_POST['description'];
$sell_date = $_POST['sell_date'];
$status = $_POST['status'];


$query = "INSERT INTO `product` (`seller_id`,`name`,`image`,`start_time`,`end_time`,`original_price` , `sell_price` , `original_quantity` , `remain_quantity` , `description` , `sell_date` , `status` ) VALUES ('$seller_id','$name','$image', '$start_time' ,'$end_time', '$original_price' , '$sell_price' , '$original_quantity' , '$remain_quantity' , '$description' , '$sell_date' , '$status' )";

//trigger bug
// $result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);

if(mysqli_query($connect,$query))
{

echo " Succesfully update";

}
else
{
echo "Try again Later ..." .mysqli_error($connect) ;

}

?>


