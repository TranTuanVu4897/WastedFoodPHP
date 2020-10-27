<?Php
$account_id = mysqli_real_escape_string($connect, $id);
$name = mysqli_real_escape_string($connect, $name);
$phone = mysqli_real_escape_string($connect, $phone);
$image = mysqli_real_escape_string($connect, $image);
$dob = mysqli_real_escape_string($connect, $image);
$gender = mysqli_real_escape_string($connect, $gender);

$query1 = "UPDATE `buyer` SET `date_of_birth`='$dob',`image`='$image',`gender`='$gender',`name`='$name' WHERE `account_id` = $account_id";
$result = $connect->query($query1);
$query2 = "UPDATE `account` SET `phone` = `$phone` WHERE `id` = $account_id";
$result = $connect->query($query2);

?>