<?php

echo "Welcome user 8082. Wish you live forever.";

require 'connection.php';
$result = mysqli_query($connect, "Select now();");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row[0];
}
