<?php

require_once "base.php";
require_once "models/articles_model.php";


class Articles extends Base {
    function __construct() {
        $data['logged'] = (isset($_SESSION['logged']) && $_SESSION['logged'] == true);
        $data['username'] = (isset($_SESSION['username'])) ? '<div class="username"><span>Hello, '.  $_SESSION['username'].'</span></div>' : "";
        $data['title'] = "Articles";
        
        $ArticlesModel = new ArticlesModel();
        $articles = $ArticlesModel->getArticles();
        
        $data["article"] = $articles;
        
        echo $this->render2($data,'top.php');
        echo $this->render2($data,'articles.php');
        echo $this->render2($data,'bottom.php');
    }
    
}


