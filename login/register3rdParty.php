<?php
require "../connection.php";
require "../model/buyer.php";

//get 3rd party id


$thirdPartyId = $_POST["thirdPartyId"];
$name = $_POST["name"];
$urlImage = $_POST["urlImage"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$email = $_POST["email"];

// $thirdPartyId = "anh28121998";
// $name ="Nguyen Ngoc Anh";
// $urlImage = "";
// $dob = "11/11/1111";
// $gender = "Nữ";
// $email = "anhngoc@gmail.com";

$thirdPartyId = mysqli_real_escape_string($connect,$thirdPartyId);
$name = mysqli_real_escape_string($connect, $name);
$urlImage = mysqli_real_escape_string($connect, $urlImage);
$dob = mysqli_real_escape_string($connect, $dob);
$gender = mysqli_real_escape_string($connect, $gender);
$email = mysqli_real_escape_string($connect, $email);


$query1 = <<<EOF
        SELECT `id`, `role_id`, `username`, `password`, `phone`, 
            `third_party_id`, `email`, `created_date`, `is_active`, 
            `date_of_birth`, `name`, `image`, `gender`
        FROM `account` 
        JOIN `buyer` 
        ON `account`.`id` = `buyer`.`account_id` 
        WHERE `third_party_id` = '$thirdPartyId';
EOF;
$result = $connect->query($query1);
$role_id = 0;
$active = true;
$listBuyer = array();


//3rd party id not exist -> register
if($result->num_rows<=0){
    //take count for get number
    
    $query2 = "SELECT COUNT(`id`) FROM `account` WHERE id LIKE '30%'";
    $result = $connect->query($query2);
    while($row = mysqli_fetch_row($result)){
        $count = $row[0];
        $id = "30" . $count;
        
        $username = "test" . $id;
        //echo $username;
    }
    //insert into account
    $query3 = "INSERT INTO `account` (`id`, `role_id`, `username`, `password`, `phone`, `third_party_id`, `email`, `created_date`, `is_active`, `modified_date`)
    VALUES ('$id', '3', '$username', '$username', NULL, '$thirdPartyId', '$email', current_timestamp(), '1', current_timestamp())";
    //$result = $connect->query($query3);
    if(mysqli_query($connect, $query3)){
        
    } else{
        echo"error";
        exit();
    }
    //insert into buyer
    $query4 = "INSERT INTO `buyer` (`account_id`, `date_of_birth`, `image`, `gender`, `modified_date`, `name`)
    VALUES ('$id', '$dob', '$urlImage', '$gender', current_timestamp(), '$name')";
    if(mysqli_query($connect, $query4)){
        
    } else{
        echo"error";
        exit();
    }
}


    
//3rd party id exist -> login    
$result = $connect->query($query1);

    while($row = mysqli_fetch_assoc($result)){
        $role_id = $row['role_id'];
        $active = $row['is_active'];
        array_push($listBuyer, new Buyer($row['id'], $row['role_id'], $row['username'], $row['password'], $row['phone'],$row['third_party_id'], $row['email'], $row['created_date'], $row['is_active'], $row['name'],$row['date_of_birth'],$row['image'],$row['gender']));
    }
    echo json_encode($listBuyer);
    
?>
