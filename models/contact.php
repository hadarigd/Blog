<?php

error_reporting('E_ALL ^ E_NOTICE');
require_once "models/Model.php";

	class ContactModel extends Model {
		public function addcontact(){
			if(isset($_POST['submit'])){
				$name=$_POST['name'];
				$lname=$_POST['lname'];
				$mail=$_POST['mail'];
				$message=$_POST['message'];
				$to='dan_hada_88@yahoo.com';
				$header='From: '.$mail;
				$subject = "Message from: "."\n"."Name: ".$name."\n"."Last name: ".$lname."\n"."Email: ".$mail;
				$body = "MESSAGE: ".$message."\n";
				$m=mail($to,$subject,$body,$subject);
				
				if($m){
					$sql = "INSERT into Contact (name, last_name, email, message) VALUES ('".$name."','".$lname."','".$mail."','".$message."')";
					$this -> makeSql($sql, false);
				}else{
					$er="Message not sent";
				}
			}
		}
		
	}
?>
