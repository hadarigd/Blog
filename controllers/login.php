<?php

require_once "base.php";
require_once "models/users_model.php";

define("SALT", 'weryosloku');

class Login extends Base {
    function __construct() {
        $er="";
        if (isset($_POST['email'])){                                    //verificare submit
            if(!empty($_POST['email']) && !empty($_POST['password'])){  // verificare daca nu suntgoale campurile 
                $user = new UsersModel();                                // instantiem obiectul users
                $login = $user -> login($_POST['email'], $this -> encrypt_password($_POST['password']));
                if(is_array ($login)){ //verific daca exista email si pass in DB
                    $_SESSION['logged'] = true;
                    $_SESSION['username'] = $login[0]['username'];
                    header('Location: index.php?page=admin');
                }
            } else {
            	$_SESSION['logged']=false;
            	$er="Incorect password or username";
            }
        }
        
        if(isset($_GET['action']) && $_GET['action'] === "logout"){
            $_SESSION['logged'] = false;
            unset( $_SESSION['username']);
        }
        
		 
        
		
		$data['error'] = $er;
        $data['title'] = "Login";
        echo $this->render2($data,'top.php');
        echo $this->render2($data,'login.php');
        echo $this->render2($data,'bottom.php'); // mesaj 
    }
    
	private function encrypt_password($password) {
		return (sha1($password.SALT));
 	}
}
                            //* user: d@yahoo.com / pass: 12345 *//  -  for testing this blog. 


?>

