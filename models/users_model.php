<?php

require_once "Model.php";

class UsersModel extends Model {
    public function login($email, $password){
        $sql = 'SELECT `username` FROM logins WHERE `email`="'.$email.'" and `password`="'.$password.'"'; // we select a specific page from the db
        $result = $this->makeSql($sql,true);
        if(count($result) > 0 ){  // we check if we get a result
            return $result;
            
        }else{
            return false; // no result in the database
        }
    }
    
    public function create(/*?*/) {
        // return true|false    
    }
    
    public function del(/*?*/) {
        // return true|false    
    }
}
