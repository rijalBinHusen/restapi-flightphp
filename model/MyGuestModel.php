<?php
require_once(__DIR__ . '/database.php');

class MyGuestsModel
{
    protected $database;
    var $table = "myguests";
    var $columns = "id, firstname, lastname, email";
    function __construct()
    {
        $this->database = new sqldatabase();
    }
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
    public function getMyGuests()
    {
        return Flight::json(array(
            'status' => 'success',
            'data' => $this->database->getData($this->columns, $this->table)
        ));
    }
    public function writeGuest($firstname, $lastname, $email)
    {
        $res = $this->database->writeData($this->table, "( firstname, lastname, email )", "( '" . $firstname . "', '" . $lastname . "', '" . $email. "'");
        return Flight::json(array(
            'status' => $res
        ));
    }
    public function deleteGuest($id) {
        $res = $this->database->deleteData($this->table, 'id', $id);
        return Flight::json(array(
            'status' => $res
        ));
    }
}
