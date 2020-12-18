<?php

echo "Welcome user 8082. Wish you live forever.";

require 'connection.php';
$query = "Select now();";
$result = mysqli_query($connect,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);
echo $result->num_rows;
while ($row = mysqli_fetch_assoc($result)) {
    echo $row[0];
}
