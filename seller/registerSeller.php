<?php
require "../connection.php";


$role = 2;
$name = $_POST['name'];
$description = $_POST['description'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$address = $_POST['address'];
$imageURL = $_POST['imageURL'];
$firebase_UID = $_POST['firebase_UID'];
$username = $_POST['username'9];



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
 }

 
  //insert into account
  $query3 = "INSERT INTO `account` (`id`, `role_id`, `username`, `password`, `phone`, `third_party_id`, `email`, `created_date`, `is_active`, `modified_date` , `firebase_UID`)
  VALUES ('$id', '$role', '$username', '$password', '$phone', NULL, '$email', current_timestamp(), '2', current_timestamp() , '$firebase_UID')";
  $result = mysqli_query($connect,$query3) or trigger_error("Query Failed! SQL: $query3 - Error: ".mysqli_error($connect), E_USER_ERROR);

  //insert into seller
  $query4 = "INSERT INTO `seller` (`account_id`, `latitude`, `image`, `longitude`, `modified_date`, `name`, `address`,`description`,`rating`)
  VALUES ('$id', '$latitude', '$imageURL', '$longitude', current_timestamp(), '$name' , '$address','$description' , '5.0')";
  $result = mysqli_query($connect,$query4) or trigger_error("Query Failed! SQL: $query4 - Error: ".mysqli_error($connect), E_USER_ERROR);

 $connect->close();
