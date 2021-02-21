<?php


include_once '../models/Login.php'; 
include_once '../models/guest.php'; 
include_once '../models/User.php'; 
include_once '../models/message.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author mohamedsalah
 */
class User {
    public $ID; 
   public $Fname;
   public $Lname;
   public $username;
   public $Password;
   public $type_id;
   public $balance;
   
   
   public function login($username , $password){
        $query = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";
        
        $object = new database();
        $result = $object->query($query);
        $res = $object->database_num_rows();
        $assoc = $object->query_associ($result);
        if($res > 0){
            if($assoc['type_id'] == 1){
                 header('Location: http://localhost:8080/hotel/view/index.php');
                return TRUE;
            }
            elseif ($assoc['type_id'] == 2) {
             header('Location: http://localhost:8080/hotel/view/index2.php');
            return TRUE;
        }
        elseif ($assoc['type_id'] == 6 or $assoc['type_id'] == 7) {
        header('Location: http://localhost:8080/hotel/view/index4.php');
    }
    elseif ($assoc['type_id'] == 4) {
        header('Location: http://localhost:8080/hotel/view/index5.php');
    }
        else{
            throw new Exception ("Error in Login");
            
    }
    
    $object->closedb();
    return TRUE;
    }
    return FALSE;
}







public function receivemessage($idreceiver)
{
  $object = new database();
  $mes = new message();
  $query = "SELECT * FROM `message` WHERE receiver_id = '$idreceiver' AND state_id = '4'";
  $result = $object->query($query);
       
        while ($assoc = $object->query_associ($result))
        {
           $mes->ID = $assoc['ID']; 
           $mes->sender_id = $assoc['sender_id']; 
           $mes->receiver_id = $assoc['receiver_id']; 
           $mes->content = $assoc['content']; 
           $mes->date_id = $assoc['date_id']; 
           $mes->state_id = $assoc['state_id']; 
           $mes->time = $assoc['time']; 
           
           return $mes;
        }
    
}

public function numofmessage($idreceiver)
{
   $object = new database();
   $query = "SELECT ID FROM `message` WHERE receiver_id = '$idreceiver' AND state_id = '4'";
   $result = $object->query($query);
   
   $rowcount=mysqli_num_rows($result);
   
   return $rowcount;
}

public function idofmessage($idreceiver)
{
   $object = new database(); 
   $query = "SELECT ID FROM `message` WHERE receiver_id = '$idreceiver' AND state_id = '4'";
   $result = $object->query($query);
   $assoc = $object->query_associ($result);
   
   $idmessage =  $assoc['ID'] ;
   
   return $idmessage;
}

public function updatestate($idmessage)
{
    $object = new database();
    $data['state_id'] = "3";
    $object->update("message", $data, "ID = '$idmessage'");
}


public function sendmessage(message $mes)
{
  $object = new database();
     $data['sender_id'] = $mes->sender_id;
     $data['receiver_id'] = $mes->receiver_id;
     $data['content'] = $mes->content;
     $data['date_id'] = $mes->date_id;
     $data['state_id'] = $mes->state_id;
     $data['time'] = $mes->time; 
     
     $object->insert("message", $data);
}

public function checkdate ($date)
{
   $object = new database();
   
   
   $query = "SELECT ID FROM `date` WHERE date = '$date'";
   $result = $object->query($query);
   $assoc = $object->query_associ($result);
   
   $date_id = $assoc['ID'];
   
   if($date_id!=null)
   {
       return $date_id;
   }else{
       $data['date'] = $date;
     $object->insert("date", $data) ; 
     $query = "SELECT ID FROM `date` WHERE date = '$date'";
   $result = $object->query($query);
   $assoc = $object->query_associ($result);
   
   $date_id = $assoc['ID'];
   return $date_id;
   }
}
}
