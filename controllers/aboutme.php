<?php

require_once "base.php";

class Aboutme extends Base {
    function __construct() {
        $data['logged'] = (isset($_SESSION['logged']) && $_SESSION['logged'] == true);
        $data['username'] = (isset($_SESSION['username'])) ? '<div class="username"><span>Hello, '.  $_SESSION['username'].'</span></div>' : "";
        $data['title'] = "About me";
        echo $this->render2($data,'top.php');
        echo $this->render2($data,'aboutme.php');
        echo $this->render2($data,'bottom.php');
    }
    
}
