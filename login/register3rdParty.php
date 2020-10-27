<?php
require "../connection.php";

//get 3rd party id


$thirdPartyId = $_POST["thirdPartyId"];
$name = $_POST["name"];
$urlImage = $_POST["urlImage"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$email = $_POST["email"];

// $thirdPartyId = "tung11918";
// $name ="Nguyen Ngoc Anh";
// $urlImage = "";
// $dob = "11/11/1111";
// $gender = "Nữ";
// $email = "anh@gmail.com";

$thirdPartyId = mysqli_real_escape_string($connect,$thirdPartyId);
$name = mysqli_real_escape_string($connect, $name);
$urlImage = mysqli_real_escape_string($connect, $urlImage);
$dob = mysqli_real_escape_string($connect, $dob);
$gender = mysqli_real_escape_string($connect, $gender);
$email = mysqli_real_escape_string($connect, $email);


$query1 = "SELECT `id` FROM `account` WHERE `third_party_id` = '$thirdPartyId'";
$result = $connect->query($query1);



//3rd party id exist -> login
if($result->num_rows>0){
    //return OK
    echo "OK";
    exit();
}

else{
    //3rd party id not exist -> register
    $query2 = "SELECT COUNT(`id`) FROM `account`";
    $result = $connect->query($query2);
    while($row = mysqli_fetch_row($result)){
        $count = $row[0];
    }

    
    
    //take count for get number
    // $username = "test" . $count;
    $id = "30" . $count;
    //insert into account
    $query3 = "INSERT INTO `account` (`id`, `role_id`, `username`, `password`, `phone`, `third_party_id`, `email`, `created_date`, `is_active`, `modified_date`)
    VALUES ('$id', '3', '$username', '$username', NULL, '$thirdPartyId', '$email', current_timestamp(), '1', current_timestamp())";
    //$result = $connect->query($query3);
    if(mysqli_query($connect, $query3)){
        echo "success";
    } else{
        echo"error";
    }
    //insert into buyer
    $query4 = "INSERT INTO `buyer` (`account_id`, `date_of_birth`, `image`, `gender`, `modified_date`, `name`)
    VALUES ('$id', '$dob', '$urlImage', '$gender', current_timestamp(), '$name')";
    $result = $connect->query($query4);
}
?>
