<?php
require "account.php";

class Seller extends Account{
    public $name;
    public $image;
    public $address;
    public $latitude;
    public $longitude;
    public $description;
    function __construct($id,$role_id,$username,$password,$phone,$third_party_id,$email,$create_date,$is_active,$name,$image,$address,$latitude,$longitude,$description)
    {
        parent::__construct($id,$role_id,$username,$password,$phone,$third_party_id,$email,$create_date,$is_active);
        $this->name=$name;
        $this->image =$image;
        $this->address=$address;
        $this->latitude=$latitude;
        $this->longitude=$longitude;
        $this->description=$description;
    }
}