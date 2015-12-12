<?php

include "Model.php";
	
	class Pages_model extends Model{
		
		public function get($param){
			if($param=='all'){
				$sql = 'SELECT * FROM pages'; // we select all pages form the database
			} else {
				$sql = 'SELECT * FROM pages WHERE `key`="'.$param.'"'; // we select a specific page from the db
			}
			$result = $this -> makeSql($sql,true);
			if( count($result) > 0 ){ // we check if we get a result
				return $result;
			} else {
			    return 'Page not found (Not in the database)'; // no result in the database
		}
		// return a page or a list of pages
		}
		
		public function create($param){
			$sql = "SELECT `key` FROM pages WHERE `key`='".$param['key']."'";    
			$result=makeSql($sql,true);
			if(count($result) < 1){
				$sql = "INSERT INTO pages (`key`,`title`,`body`) VALUES ('".$param['key']."', '".$param['title']."', '".$param['body']."' )";
				makeSql($sql, false);
				return true;
			}else{
				return false;
			}
			
			// return true|false
		}
		
		public function modify($param, $old_key){
			if($param['key'] == $old_key){
				$sql = "UPDATE pages SET `title` = '".$param['title']."', `body` = '".$param['body']."' WHERE `key` = '".$param['key']."'";  
				makeSql($sql, false); 
				return true;
			} else {
				$sql = "SELECT `key` FROM pages WHERE `key` = '".$param['key']."'";
				$result = makeSql($sql, true);
				if(count($result) > 0) {
					return false;
				} else {
					$sql = "UPDATE pages SET `key` = '".$param['key']."',`title` = '".$param['title']."', `body` = '".$param['body']."' WHERE `key` = '".$old_key."'";  
					makeSql($sql, false);
					return true;
				}
			}
			
			// return true|false    
		}
		
		public function del($param) {
			$sql = "SELECT * FROM pages WHERE `key` = '".$param."'";
			$result = makeSql($sql, true);
			if (count($result) > 0){
				$sql = " DELETE FROM pages WHERE `key` = '".$param."'";
				makeSql($sql, false);
				return true;
			} else {
				return false;
			}
			
			// return true|false    
		}
	}
	
	
