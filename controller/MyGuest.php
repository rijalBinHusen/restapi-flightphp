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
    public function addMyGuest() {
        $req = Flight::request();
        $firstname = $req->query->firstname;
        $lastname = $req->query->lastname;
        $email = $req->query->email;
        return $this->MyGuestsModel->writeGuest($firstname, $lastname, $email);
    }
    public function getGuestById($id) {
        // myguest/8
        // the 8 will automatically becoming parameter $id
        return $this->MyGuestsModel->getGuestById($id);
    }
    public function deleteGuest($id) {
        // myguest/8
        // the 8 will automatically becoming parameter $id
        return $this->MyGuestsModel->deleteGuest($id);
    }
}