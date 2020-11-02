<?php
require "../connection.php";
require "../model/seller.php";
//get username and password from url parameters
//$buyer_id = $_REQUEST['buyer_id'];
$buyer_id = 3001;

// $username = "test";
// $password = "test";

//remove special string from parameters
$buyer_id = mysqli_real_escape_string($connect, $buyer_id);

$query = "SELECT `account_id`,`name`,`image`,`address`,`latitude`,`longitude`,`description` FROM `seller` INNER JOIN `list_follow` ON seller.account_id = list_follow.seller_id WHERE list_follow.buyer_id = $buyer_id";
$result = $connect->query($query);

$listSeller = array();

while($row = mysqli_fetch_assoc($result)){
    
    array_push($listSeller, new Seller($row['account_id'],null,null,null,null,null,null,null,null,$row['name'],$row['image'],$row['address'],$row['latitude'],$row['longitude'],$row['description']));
}
//return json object if not error
echo json_encode($listSeller) ;
$connect->close();
?>