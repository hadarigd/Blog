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
        
        $ArticlesModel = new ArticlesModel();								//    at this point I show the TOP of the page
        echo $this->render2($data,'top.php');								// 
        
        
        if(isset($_GET['edit_id'])){										//
            $id=$_GET['edit_id'];											//
            $articles = $ArticlesModel->getArticles($id);					//    at this point I show the EDIT of the page
            $data["article"] = $articles;									//
            echo $this->render2($data,'edit_article.php');					//
            $check_getdata = false;											//
        }
        
        if(isset($_POST['article_title_update'])){							//
        		$ArticlesModel->updateArticles($_POST['id']);				//    at this point I show the UPDATE of the page
        	}
        
        
        if(isset($_POST['article_title_add'])){								//
            //$ArticlesModel = new ArticlesModel();							//
			$ArticlesModel -> addArticle();									//    at this point I show the ADD of the page
            echo $this->render2($data,'admin.php');							//
            $check_getdata = false;											//
        }
        
        if(isset($_GET['delete_article'])){									//    at this point I show the DELETE of the page
			echo "articol sters";											//
			$ArticlesModel->deleteArticle($_GET['delete_id']);				//
        }
        
        if($check_getdata){													//
            $articles = $ArticlesModel->getArticles();						//
            $data["article"] = $articles;									//    at this point I show the  BOTTOM of the page
			echo $this->render2($data,'admin.php');							//
        }																	//
        echo $this->render2($data,'bottom.php');							//
    }
}




