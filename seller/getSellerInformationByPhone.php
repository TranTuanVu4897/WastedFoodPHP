<?php
require "../connection.php";
require "../model/seller.php";

$phone = $_REQUEST['phone'];

$phone = mysqli_real_escape_string($connect, $phone);

//sql string get info
$query = <<<EOF
        SELECT `id`, `role_id`, `username`, `password`, `phone`, 
            `third_party_id`, `email`, `created_date`, `is_active`, 
            `name`,`image`,`address`,`latitude`,`longitude`,`description`,`firebase_UID`
        FROM `account` 
        JOIN `seller` 
        ON `account`.`id` = `seller`.`account_id` 
        WHERE `phone` = '$phone' 
EOF;

$result = $connect->query($query);

$role_id = 0;
$active = 0;

$listSeller = array();

while ($row = mysqli_fetch_assoc($result)) {
    $role_id = $row['role_id'];
    $active = $row['is_active'];
    array_push($listSeller, new Seller($row['id'], $row['role_id'], $row['username'], $row['password'], $row['phone'], $row['third_party_id'], $row['email'], $row['created_date'], $row['is_active'], null, $row['name'], $row['image'], $row['address'], $row['latitude'], $row['longitude'], $row['description'], null, null));
}

echo json_encode($listSeller);
$connect->close();
