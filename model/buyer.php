<?php
require "account.php";
class Buyer extends Account{
    public $name;
    public $date_of_birth;
    public $image;
    public $gender;
    // function Buyer($account_id,$name,$date_of_birth,$image,$gender){
    //     $this->account_id = $account_id;
    //     $this->name = $name;
    //     $this->date_of_birth = $date_of_birth;
    //     $this->image = $image;
    //     $this->gender = $gender;
    // }

    function __construct($id,$role_id,$username,$password,$phone,$third_party_id,$email,$create_date,$is_active,$name,$date_of_birth,$image,$gender)
    {
        parent::__construct($id,$role_id,$username,$password,$phone,$third_party_id,$email,$create_date,$is_active);
        $this->name=$name;
        $this->date_of_birth = $date_of_birth;
        $this->image =$image;
        $this->gender = $gender;
    }
}