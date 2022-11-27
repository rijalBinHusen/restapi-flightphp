<?php

require('database.php');

class ArticlesModel
{
    protected $conn;
    protected $result;
    function __construct()
    {
        $this->conn =  new sqldatabase();
    }
    public function getArticles()
    {
        $this->result = $this->conn->status();
        return $this->result;
        // return "Helloworld";
    }
}
