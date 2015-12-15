<?php

error_reporting('E_ALL ^ E_NOTICE');

require_once "models/Model.php";

class ArticlesModel extends Model {
    public function addArticle(){
        if(isset($_POST['submit'])){
            $author = $_POST['author'];
            $article_title = $_POST['article_title_add'];
            $text = $_POST['text'];
            // @comment - you model extends MOdel, no need to instantiate new Model again
            $datasql = new Model();
            $sql = "INSERT INTO articles (author, article_title, text) VALUES ('".$author."','".$article_title."','".$text."')";
            $datasql -> makeSql($sql, false);
        } else {
            $er="Message not sent";
        }
    }
    
    public function getArticles($param='ALL'){
            if($param=='ALL'){
                $sql = "SELECT * FROM articles";
            }else{
                $sql = "SELECT * FROM articles WHERE ID ='".$param."'";
            }
            $datasql = new Model();
            
            $result = $datasql->makeSql($sql, true);
            return $result;
    }
    
    public function deleteArticle($id){
        $sql = "DELETE from articles WHERE ID = '".$id."'"; 
        $datasql = new Model();
        $result = $datasql->makeSql($sql, false);
        return $result;
    }
    
    public function updateArticles($id){
        $author = $_POST['author'];
        $article_title = $_POST['article_title_update'];
        $text = $_POST['text'];
        $datasql = new Model();
        $sql = "UPDATE articles SET author='".$author."', article_title='".$article_title."', text='".$text."' WHERE ID='".$id."'";
        $datasql -> makeSql($sql, false);
    
    }
}
?>
