<?php
require_once(__DIR__ .'/../model/MyGuestModel.php');

class MyGuest {
    protected $MyGuestsModel;
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
        $this->MyGuestsModel = new MyGuestsModel();
    }
    public function getMyGuests() {
        return $this->MyGuestsModel->getMyGuests();
    }
}