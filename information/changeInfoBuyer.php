<?Php
require "../connection.php";
// $account_id = 3013;
// $name = "Nguyen Ngoc Anh";
// $phone = "023231212";
// $urlImage = null;
// $dob = null;
// $gender = 0;

$account_id = $_POST['account_id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$urlImage = $_POST['urlImage'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];

$account_id = mysqli_real_escape_string($connect, $account_id);
$name = mysqli_real_escape_string($connect, $name);
$phone = mysqli_real_escape_string($connect, $phone);
$urlImage = mysqli_real_escape_string($connect, $urlImage);
$date_of_birth = mysqli_real_escape_string($connect, $date_of_birth);
$gender = mysqli_real_escape_string($connect, $gender);

$query1 = "UPDATE `buyer` SET `date_of_birth`='$date_of_birth',`image`='$urlImage',`gender`=$gender,`name`='$name' WHERE `account_id` = $account_id";
$result = $connect->query($query1);
$query2 = "UPDATE `account` SET `phone` = '$phone' WHERE `id` = $account_id";
$result = $connect->query($query2);

if(mysqli_query($connect, $query1)){
 
}else{
    echo "failed";
    exit();
}
if(mysqli_query($connect, $query2)){

}else{
    echo "failed";
    exit();
}

?>