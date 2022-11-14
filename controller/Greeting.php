<?php
class Greeting
{
    public function __construct() {
        $this->name = 'John Doe';
    }

    public function hello() {
        echo "Hello, {$this->name}!";
    }
    
    public function hello2($name, $id) {
        echo "Hello, $name - $id!";
    }
}