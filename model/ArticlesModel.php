<?php
require_once(__DIR__ . '/database.php');

class ArticlesModel
{
    protected $database;
    var $table = "articles";
    var $columns = "id, title, body";
    function __construct()
    {
        $this->database = new sqldatabase();
    }
    public function getArticles()
    {
        return Flight::json(array(
            'status' => 'success',
            'data' => $this->database->getData($this->columns, $this->table)
        ));
    }
}
