<?php

include_once '../models/database.php';
include_once '../models/User.php';
include_once '../models/room.php';

/**
 * Description of guest
 *
 * @author mohamedsalah
 */


class guest extends User{
    
    public $checkindate;
    public $checkoutdate;
    public $city;
    public $nationality;
    public $roomtype_id;
    
    
    public function Regist(guest $U)
    {
    
        $dat = new database();
             $data['Fname'] = $U->Fname;
             $data['Lname'] = $U->Lname;
             $data['username'] = $U->username;
             $data['password'] = $U->Password;
             $data['type_id'] = $U->type_id;
             $data['balance'] = $U->balance;
             
         $dat->insert('user', $data); 
     
          $query = "SELECT ID FROM `user` WHERE username = '$U->username'";
        
        $result = $dat->query($query);
        $id = $dat->query_associ($result);
        
        
        
         $data3['checkindate'] = $U->checkindate;
         $data3['checkoutdate'] = $U->checkoutdate;
         $data3['city'] = $U->city;
         $data3['nationality'] = $U->nationality;
         $data3['roomtype_id'] = $U->roomtype_id;
         
         $data3['user_id'] = $id['ID'];
         $dat->insert('guist', $data3); 
   
    }
    
    public function registroom(room $rom)
    {
       $dat = new database();
        
        $data['user_id'] = $rom->user_id;
        $data['room_id'] = $rom->ID;
        
        $dat->insert("userroom", $data);
    }
    
    public function gettyperoom ($userid)
    {
        $dat = new database();
        $query = "SELECT roomtype_id FROM `guist` WHERE user_id = '$userid'";
        
        $result = $dat->query($query);
        $related = $dat->query_associ($result);
        $roomtype_id = $related['roomtype_id'];
       
       return $roomtype_id;
         
    }

        public function updateroomtype ($idtype , $iduser , $checkin , $checkout)
    {
       $dat = new database();
       $data['roomtype_id'] = $idtype;
       $data['checkindate'] = $checkin;
       $data['checkoutdate'] = $checkout;
       
       $dat->update("guist", $data, "user_id = '$iduser'");
    }

        public function getdataaboutroom($typeroom)
    {
       $dat = new database();
       $room = new room();
       $query = "SELECT ID FROM roomtype WHERE type ='$typeroom'";
       $query2 = $dat->query($query);
       $related = $dat->query_associ($query2);
       
       $idtyperoom = $related['ID'];
       
       $query1 = "SELECT * FROM room WHERE roomtype_id ='$idtyperoom' AND state_id = '1'";
       $query3 = $dat->query($query1);
       $related1 = $dat->query_associ($query3);
       
       $room->roomnum = $related1['roomnum'];
       $room->roomtype_id = $related1['roomtype_id'];
       $room->price = $related1['price'];
       $room->ID = $related1['ID'];
       $room->state_id = $related1['state_id'];
       
       $query5 = "SELECT user_id FROM userroom WHERE room_id ='$room->ID '";
       $query4 = $dat->query($query5);
       $related2 = $dat->query_associ($query4);
         
       $room->user_id = $related2['user_id'];
       
       return $room;
    }
    
    public function updatestateroom($roomnumber)
    {
       $dat = new database();
       $data['state_id'] = "2";
       $dat->update("room", $data, "roomnum = '$roomnumber'");
    }

    
    public function updatestatecleanroom($roomnumber)
    {
       $dat = new database();
       $data['state_clean_id'] = "6";
       $dat->update("room", $data, "roomnum = '$roomnumber'");
    }

    
        public function checkusername($username)
    {
          $dat = new database();
      $query = "SELECT username FROM user WHERE username ='$username'";
      $query2 = $dat->query($query);
       $related = $dat->query_associ($query2);
       
       return $related['username'];
    }

        public function get_type_of_user($type)
    {
        $object =  new database();
        $query = "SELECT ID FROM `usertype` WHERE type = '$type'";
        
        $result = $object->query($query);
        $id = $object->query_associ($result);
       
   
        return $id['ID'];
}



public function get_type_of_room($type)
    {
        $object =  new database();
        $query = "SELECT ID FROM `roomtype` WHERE type = '$type'";
        
        $result = $object->query($query);
        $id = $object->query_associ($result);
       
   
        return $id['ID'];
    
    
}


public function get_id_of_user($username)
    {
        $object =  new database();
        $query = "SELECT * FROM user WHERE username = '$username'";
        
        $result = $object->query($query);
        $id = $object->query_associ($result);
       
   
        return $id['ID'];
    
    
}

public function getroomnum($username)
{
  $object =  new database();
  $iduser =  $this->get_id_of_user($username); 
  
    $query = "SELECT room_id FROM userroom WHERE user_id = '$iduser'";
        
        $result = $object->query($query);
        $id = $object->query_associ($result);
       
      $idroom =  $id['room_id'];
      
       $query1 = "SELECT roomnum FROM room WHERE ID = '$idroom'";
        
        $result1 = $object->query($query1);
        $roomnum = $object->query_associ($result1);
        
        return $roomnum['roomnum'];
}

public function get_username_of_user($id)
    {
        $object =  new database();
        $query = "SELECT username FROM `user` WHERE ID = '$id'";
        
        $result = $object->query($query);
        $username = $object->query_associ($result);
       
   
        return $username['username'];
    
    
}


public function getalldata($username) {
     $dat = new database();
     $guist = new guest(); 
     
      $query = "SELECT * FROM user WHERE username ='$username'";
      $query2 = $dat->query($query);
      $related = $dat->query_associ($query2);
      $guist->ID = $related['ID'];
      $query1 = "SELECT * FROM guist WHERE user_id ='$guist->ID'";
      $query3 = $dat->query($query1);
      $related2 = $dat->query_associ($query3);
       
      
       
       $guist->Fname = $related['Fname'];
       $guist->Lname = $related['Lname'];
       $guist->username = $related['username'];
       $guist->Password = $related['password'];
       $guist->balance = $related['balance'];
       
       $typeid = $related['type_id'];
       $query9 = "SELECT type FROM usertype WHERE ID ='$typeid'";
       $query6 = $dat->query($query9);
       $related4 = $dat->query_associ($query6);
       
       $guist->type_id = $related4['type'];
       $guist->city = $related2['city'];
       $guist->nationality = $related2['nationality'];
       $guist->checkindate = $related2['checkindate'];
       $guist->checkoutdate = $related2['checkoutdate'];
       $typeroom_id = $related2['roomtype_id'];
       
       $query4 = "SELECT type FROM roomtype WHERE ID ='$typeroom_id'";
       $query5 = $dat->query($query4);
       $related3 = $dat->query_associ($query5);
      
       $guist->roomtype_id = $related3['type'];
       
       return $guist;
}

public function Updateprofile(guest $g)
{
    $dat = new database();
    
    $data['Fname'] = $g->Fname;
    $data['Lname'] = $g->Lname;
    $data['username'] = $g->username;
    $data['password'] = $g->Password;
   
    
    $dat->update("user", $data, "ID = '$this->ID'");
            
    $data2['city'] = $g->city;
    $data2['nationality'] = $g->nationality;
    
    $dat->update("guist", $data2, "user_id = '$this->ID'");
}

//public function Delete($id)
//{
//  $dat = new database();
//  $dat->delete("user", "ID = '$id'");
//  $dat->delete("guist", "user_id = '$id'");
//}

    public function deleteguest($username)
    {
        $dat = new database();
        $userid =  $this->get_id_of_user($username);
        $dat->delete("user", "username = '$username'");
        $dat->delete("guist", "user_id = '$userid'");
    }

    public function check2()
    {
        $dat = new database();  
$query="SELECT user_id FROM guist WHERE 1";
//
$result = $dat->query($query);
//
while ($row = $dat->query_associ($result)) {
    $storeArray =  $row['checkoutdate'];
    $c_date = new DateTime();
    $l_date = new DateTime($storeArray);
    $storeArray1 =  $row['user_id'];
    //Check is Current date = lockout date
if ($c_date->format('Y-m-d') <= $l_date->format('Y-m-d')) {
  echo  "$storeArray";
  
   echo  "$storeArray1";
   
   $query1="SELECT room_id FROM userroom user_id =  '$storeArray1'";
   $result1 = $dat->query($query1);
   while ($row1 = $dat->query_associ($result1)) {
    $storeArray2 =  $row1['room_id'];
    
    echo $storeArray2;
    
    $data['state_id'] = "1";
    $dat->update("room", $data, "ID = '$storeArray2'");
   }
   
}
}
    }
    
    public function check ()
    {
       $dat = new database();  
       $c_date = new DateTime();
       $c_date->modify('-0 day');
       $date = $c_date->format('Y-m-d');
       $query="SELECT user_id FROM guist WHERE checkoutdate = '$date'";
       $result = $dat->query($query);
       while ($row = $dat->query_associ($result)) {
          $userid =  $row['user_id']; 
          echo $userid;
          $query1="SELECT room_id FROM userroom WHERE user_id =  '$userid'";
   $result1 = $dat->query($query1);
   while ($row1 = $dat->query_associ($result1)) {
    $roomid =  $row1['room_id'];
    
    echo $roomid;
    
    $data['state_id'] = "1";
    $dat->update("room", $data, "ID = '$roomid'");
   }
          
       }
    }
    
    
    public function addmoreday($username , $date)
    {
      $dat = new database();  
      $iduser = $this->get_id_of_user($username);
      $data['checkoutdate'] = $date;
      $dat->update("guist", $data, "user_id = '$iduser'");
    }
}