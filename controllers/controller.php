<?php
require_once "base.php";
// require "models/pages_model.php"; // @comment - no need to include this model is not used 

class Controller extends Base {
    
    public $configPages = array(
        "home" => array("home.php", "Home"),
        "aboutme" => array("aboutme.php", "Aboutme"),
        "hobby" => array("hobby.php", "Hobby"),
        "team" => array("team.php", "Team"),
        "articles" => array("articles.php", "Articles"),
        "login" => array("login.php", "Login"),
        "contact" => array("contact.php", "Contact"),
        "admin" => array("admin.php", "Admin")
    ); 
    
    function __construct() {
        $page = 'home';
        // @comment - no need to check session at this point
        //$this -> initSession();
        if(isset($_GET['page'])) {
		$page = $_GET['page'];	
        }
        
        if (isset($this->configPages[$page])) {
            // @ comment - best practice to use required when model and controlles
			include $this->configPages[$page][0];
			new $this->configPages[$page][1];
        }
    }
}
