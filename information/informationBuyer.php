<?php
require "../connection.php";

//get username and password from url parameters
$id = $_REQUEST['id'];


$id = mysqli_real_escape_string($connect, $id);


//sql string get info

$query = "SELECT  `date_of_birth`, `image`, `gender`, `name`  FROM `buyer` WHERE `account_id` = '$id'" ;
$result = $connect->query($query);
//get role_id and id
while($row = mysqli_fetch_row($result)){
    // $dob = $row[0];
    // $urlImage = $row[1];
    // $gender = $row[2];
    // $name = $row[3];
    echo '1 ' . $row[0] . '<br/>';
    echo '1 ' .$row[1]. '<br/>';
    echo '1 ' .$row[2]. '<br/>';
    echo '1 ' .$row[3]. '<br/>';
}


class Buyer{
    function Buyer($account_id,$date_of_birth,$image,$gender){
        $this->account_id = $account_id;
        $this->date_of_birth = $date_of_birth;
        $this->image = $image;
        $this->gender = $gender;
    }
}

$listBuyer = array();

while($row = mysqli_fetch_assoc($result)){
    // array_push($listBuyer, new Buyer($row['account_id'],$row['date_of_birth'],$row['image'],$row['gender']));
    array_push($listBuyer, new Buyer('3010','11/11/2011','','1'));
}
//return json object if not error
echo json_encode($listBuyer);

?>