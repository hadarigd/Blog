<?php
include "controllers/controller.php";
// define ('VIEWS', 'views/');
session_start();

define ('VIEWS', getcwd() . '/views/');

new Controller();
?>

