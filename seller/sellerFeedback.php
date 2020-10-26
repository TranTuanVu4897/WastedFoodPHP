<?php
require "../connection.php";

$title = $_POST['title'];
$description = $_POST['description'];
$account_id = $_POST['account_id'];

if (isset($_POST['description'])){

    $description = $_POST['description'];
}
else
{
    $description = null;
}



$query = "INSERT INTO `feedback` (`account_id`,`title`,`feedback_text`,`is_read`)
 VALUES ('$account_id','$title','$description', 'false')";

//trigger bug
//$result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);

if(mysqli_query($connect,$query))
{

echo " Succesfully update";

}
else
{
echo "Try again Later ..." ;

}

?>


