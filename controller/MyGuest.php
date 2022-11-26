<?php

class MyGuest {
    public function validator ($firstname, $lastname, $email) {
        $name = $_POST ["Name"];
        $name_reg = "/^[a-zA-z]*$/";
        if (!preg_match ($name_reg, $name) ) {  
            $ErrMsg = "Only alphabets and whitespace are allowed.";  
            echo $ErrMsg;  
        } else {  
            echo $name;  
        }  
    }
}