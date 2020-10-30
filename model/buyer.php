<?php

class Buyer{
    function Buyer($account_id,$name,$date_of_birth,$image,$gender){
        $this->account_id = $account_id;
        $this->name = $name;
        $this->date_of_birth = $date_of_birth;
        $this->image = $image;
        $this->gender = $gender;
    }
}