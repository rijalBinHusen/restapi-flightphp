<?php
require_once(__DIR__ .'/../model/Database.php');

class MyGuest {
    protected $database;
    // public function validator ($firstname, $lastname, $email) {
    //     $name = $_POST ["Name"];
    //     $name_reg = "/^[a-zA-z]*$/";
    //     if (!preg_match ($name_reg, $name) ) {  
    //         $ErrMsg = "Only alphabets and whitespace are allowed.";  
    //         echo $ErrMsg;  
    //     } else {  
    //         echo $name;  
    //     }  
    // }
    function __construct()
    {
        $this->database = new sqldatabase();
    }
    public function getMyGuests() {
        return Flight::json(array(
            $this->database->getData()
        ));
        // echo $this->database->getData();
    }
}