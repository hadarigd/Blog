<?php

require_once "base.php";
// require_once "models/Model.php"; // @ keep this in contact model
require_once "models/contact.php";
require_once "public/JS/jsContact.php";

    class Contact extends Base {
        function __construct() {
            $data['logged'] = (isset($_SESSION['logged']) && $_SESSION['logged'] == true);
            $data['username'] = (isset($_SESSION['username'])) ? '<div class="username"><span>Hello, '.  $_SESSION['username'].'</span></div>' : "";
            $data['title'] = "Contact";
            echo $this->render2($data,'top.php');
            
			if(isset($_POST['submit'])){
				$ContactModel = new ContactModel();
				$ContactModel -> addcontact();
			}
			
			echo $this->render2($data,'contact.php');
            echo $this->render2($data,'bottom.php', $data);
        }
        
    }

?>


