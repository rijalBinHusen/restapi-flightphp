<?php
require('./model/Articles.php');

class Articles
{
    protected $ArticlesModel;
    function __construct()
    {
        $this->ArticlesModel = new ArticlesModel();
    }
    public function getArticles()
    {
        $result = $this->ArticlesModel->getArticles();

        return Flight::json(array(
            'status' => 'success',
            'data' => $result,
        ), 200);
    }
}
