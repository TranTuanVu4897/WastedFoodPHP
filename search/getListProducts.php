<?php
require "../connection.php";

//sample place
// $lat = 21.0110168;
// $lng = 105.5182143;

$lat = $_REQUEST['lat'];
$lng = $_REQUEST['lng'];
//sample distance
$distance = 150; //$_REQUEST['distance']


//escape special characters in variable
$lat = mysqli_real_escape_string($connect, $lat);
$lng = mysqli_real_escape_string($connect, $lng);
$distance = mysqli_real_escape_string($connect, $distance);

$query = <<<EOF
        SELECT `product`.`id`,`seller_id`,`name`,`image`,`start_time`, 
        `end_time`, `original_price`,`sell_price`, `original_quantity`,
        `remain_quantity`,`description`,`sell_date`,`status`,`shippable` 
        FROM `product` JOIN 
            (   SELECT `account_id` FROM 
                    (   SELECT `account_id`, 
                            ( ( ( acos( sin(( $lat * pi() / 180)) * sin(( `latitude` * pi() / 180)) + cos(( $lat* pi() /180 )) * cos(( `latitude` * pi() / 180)) * cos((( $lng - `longitude`) * pi()/180))) ) * 180/pi() ) * 60 * 1.1515 * 1.609344 ) as distance 
                        FROM `seller` ) 
                    markers 
                WHERE distance <= $distance) 
            currents 
        ON currents.`account_id` = `product`.`seller_id`;
EOF;

$result = $connect->query($query);

//Class product
class Product
{
    function Product($id, $seller_id, $name, $image, $start_time, $end_time, $original_price, $sell_price, $original_quantity, $remain_quantity, $description, $sell_date, $status, $shippable)
    {
        $this->id = $id;
        $this->seller_id = $seller_id;
        $this->name = $name;
        $this->image = $image;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->original_price = $original_price;
        $this->sell_price = $sell_price;
        $this->original_quantity = $original_quantity;
        $this->remain_quantity = $remain_quantity;
        $this->description = $description;
        $this->sell_date = $sell_date;
        $this->status = $status;
        $this->shippable = $shippable;
    }
}

$listProduction = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($listProduction, new Product($row['id'], $row['seller_id'], $row['name'], $row['image'], $row['start_time'], $row['end_time'], $row['original_price'], $row['sell_price'], $row['original_quantity'], $row['remain_quantity'], $row['description'], $row['sell_date'], $row['status'], $row['shippable']));
}

echo json_encode($listProduction);
