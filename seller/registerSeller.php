<?php
require "../connection.php";


$role = 2;
$name = $_REQUEST['name'];
$description = $_REQUEST['description'];
$password = $_REQUEST['password'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$latitude = $_REQUEST['latitude'];
$longitude = $_REQUEST['longitude'];
$address = $_REQUEST['address'];
$imageURL = $_REQUEST['imageURL'];
$firebase_UID = $_REQUEST['firebase_UID'];



/*
$role = 2;
$name = '123';
$password = '456';
$phone = '7819121';
$email = '123';
$latitude = '1';
$longitude = '2';
$address = '3';
$imageURL = '1';
$firebase_UID = '5';
$description = '123';
*/
 //take count for get number

 $query2 = "SELECT COUNT(`id`) FROM `account` WHERE id LIKE '20%'";
 $result = mysqli_query($connect,$query2) or trigger_error("Query Failed! SQL: $query2 - Error: ".mysqli_error($connect), E_USER_ERROR);
 $result = $connect->query($query2);
 while ($row = mysqli_fetch_row($result)) {
     $count = $row[0] + 1;
     $id = "20" . $count;
     $username = "test" . $id;
     echo $username;
 }

 
  //insert into account
  $query3 = "INSERT INTO `account` (`id`, `role_id`, `username`, `password`, `phone`, `third_party_id`, `email`, `created_date`, `is_active`, `modified_date` , `firebase_UID`)
  VALUES ('$id', '$role', '$username', '$password', '$phone', NULL, '$email', current_timestamp(), '2', current_timestamp() , '$firebase_UID')";
  $result = mysqli_query($connect,$query3) or trigger_error("Query Failed! SQL: $query3 - Error: ".mysqli_error($connect), E_USER_ERROR);

  //insert into seller
  $query4 = "INSERT INTO `seller` (`account_id`, `latitude`, `image`, `longitude`, `modified_date`, `name`, `address`,`description`)
  VALUES ('$id', '$latitude', '1', '$longitude', current_timestamp(), '$name' , '$address','$description')";
  $result = mysqli_query($connect,$query4) or trigger_error("Query Failed! SQL: $query4 - Error: ".mysqli_error($connect), E_USER_ERROR);

 
 $connect->close();
