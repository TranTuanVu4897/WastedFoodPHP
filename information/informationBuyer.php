<?php
require "../connection.php";
require "../model/buyer.php";

//get username and password from url parameters
$account_id = $_REQUEST['account_id'];


$account_id = mysqli_real_escape_string($connect, $account_id);

//sql string get info

$query = "SELECT account_id, `name`, `date_of_birth`, `image`, `gender`, `name`  FROM `buyer` WHERE `account_id` = '$account_id'" ;
$result = $connect->query($query);
//get role_id and id
// while($row = mysqli_fetch_row($result)){
//     // $dob = $row[0];
//     // $urlImage = $row[1];
//     // $gender = $row[2];
//     // $name = $row[3];
//     echo '1 ' . $row[0] . '<br/>';
//     echo '1 ' .$row[1]. '<br/>';
//     echo '1 ' .$row[2]. '<br/>';
//     echo '1 ' .$row[3]. '<br/>';
// }
// $query = "SELECT  `date_of_birth`, `image`, `gender`, `name`  FROM `buyer` WHERE `account_id` = '$id'" ;
// $result = $connect->query($query);


$listBuyer = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($listBuyer, new Buyer($row['account_id'],$row['name'],$row['date_of_birth'],$row['image'],$row['gender']));
    //array_push($listBuyer, new Buyer('3010','11/11/2011','','1'));
}
//return json object if not error
echo json_encode($listBuyer);

?>