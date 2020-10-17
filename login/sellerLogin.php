<?php
require "../connection.php";

//get username and password from url parameters
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

//remove special string from parameters
$username = mysqli_real_escape_string($connect, $username);
$password = mysqli_real_escape_string($connect, $password);

//sql string get info
$query = "SELECT `id`, `username`, `password`, `phone`, `is_Active` FROM `account` WHERE `username` = '$username' AND `password` = '$password'";

//execute query
$result = $connect->query($query);

class Seller{
    function Seller($id,$username,$password,$phone,$is_Active){
        $this->Id = $id;
        $this->UserName = $username;
        $this->Password = $password;
        $this->Phone = $phone;
        $this->IsActive = $is_Active;
    }
}

$listSeller = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($listSeller, new Seller($row['id'],$row['username'],$row['password'],$row['phone'],$row['is_Active']));
}

echo json_encode($listSeller);