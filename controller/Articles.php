<?php
require_once(__DIR__ . '/../model/ArticlesModel.php');

class Articles
{
    protected $ArticlesModel;
    function __construct()
    {
        $this->ArticlesModel = new ArticlesModel();
    }
    public function getArticles()
    {
        return $this->ArticlesModel->getArticles();
    }
}
