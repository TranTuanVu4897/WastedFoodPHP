<?php
require "../connection.php";

require "../model/buyer.php";
// $result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);

$buyer = new Buyer("id","role_id","user","pass","phone","3rd","mail","create_date","active","name","date","image","gender");
echo json_encode($buyer);
