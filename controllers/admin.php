<?php

require_once "base.php";
require_once "models/articles_model.php";
require_once "public/JS/jsArticles.php";


class Admin extends Base {
    function __construct() {
        if(!(isset($_SESSION['logged']) && $_SESSION['logged'] == true)){
            header('Location: index.php?page=home');
        }
        $check_getdata = true;
        $data["article"] = $articles;
        $data['logged'] = (isset($_SESSION['logged']) && $_SESSION['logged'] == true);
        $data['title'] = "Admin";
        $data['username']="";
        
        $ArticlesModel = new ArticlesModel();
        echo $this->render2($data,'top.php');
        
        if(isset($_GET['edit_id'])){
            $id=$_GET['edit_id'];
            $articles = $ArticlesModel->getArticles($id);
            $data["article"] = $articles;
            echo $this->render2($data,'edit_article.php');
            $check_getdata = false;
        }
        
        if(isset($_POST['article_title_update'])){
        		$ArticlesModel->updateArticles($_POST['id']);
        	}
        
        
        if(isset($_POST['article_title_add'])){
            //$ArticlesModel = new ArticlesModel();
            	$ArticlesModel -> addArticle();
                echo $this->render2($data,'admin.php');
                $check_getdata = false;
        }
        
        if(isset($_GET['delete_article'])){
        	echo "articol sters";
        	$ArticlesModel->deleteArticle($_GET['delete_id']);
        }
        
        if($check_getdata){
            $articles = $ArticlesModel->getArticles();
            $data["article"] = $articles;
            echo $this->render2($data,'admin.php');
        }
        echo $this->render2($data,'bottom.php');
    }
}




