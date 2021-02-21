
<?php
session_status();
include_once '../models/database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author HP
 */
class Login {
   
    private $username;
    private $password;
    private $cxn;
     private $type_id;
    
     function __construct1() {
         
     }
     
    function __construct($data) {
        
        $this->setData($data);
        $this->connectToDb();
        $this->get_data();
        $login = $this->login();
        if($login==FALSE)
        {
             header("Location:http://localhost/mohamed/view/login.php");
             echo "<script> alert('error') ; </script>";
        }
        
    }
    
    private function setData($data)
    {
        if(is_array($data)){
            $this->username = $data['username'];
            $this->password = $data['Password'];
            //$this->type_id = $data['$type_id'];
        }
        else {
            throw new Exception("Not Array and not found data");
        }
    }
    
    private function connectToDb()
    {
       //include '../models/database.php'; 
       $obj = new database();
       //$obj->connect();
    }
     public function get_data(){
        $data['username'] = $this->username;
        $data['Password'] = $this->password;
        //$data['type_id'] = $this->type_id;
        return $data;
    }
    
     public function login(){
        $query = "SELECT * FROM `user` WHERE username = '$this->username' AND password = '$this->password'";
        //include '../models/database.php'; 
        $object = new database();
        $result = $object->query($query);
        $res = $object->database_num_rows();
        $assoc = $object->query_associ($result);
        if($res > 0){
            if($assoc['type_id'] == 1){
                 header('Location: http://localhost/mohamed/view/index.php');
               // header('Location: http://localhost/mohamed/view/regist.php');
                return TRUE;
            }
            elseif ($assoc['type_id'] == 2) {
             header('Location: http://localhost/mohamed/view/index2.php');
            return TRUE;
        }
        elseif ($assoc['type_id'] == 3) {
        
    }
        else{
            throw new Exception ("Error in Login");
            
    }
    
    $object->closedb();
    return TRUE;
    }
    return FALSE;
}
    
    
}
