<?php

include_once  '../models/User.php';
include_once  '../models/Staff.php';


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Staff
 *
 * @author HP
 */
class Staff extends User{
    
    public $ssn;
    public $salary;
    public $age;
    public $birthdate;
    public $workhours;
    public $user_id;
    
    public function login($username, $password) {
        parent::login($username, $password);
    }
 
    public function getstaffdata($user_id)
    {
      $dat = new database();
      $Staff = new Staff(); 
     
      $query = "SELECT * FROM staff WHERE user_id ='$user_id'";
      $query2  = $dat->query($query);
      $related = $dat->query_associ($query2);
     
       $Staff->ssn = $related['ssn'];
       $Staff->salary = $related['salary'];
       $Staff->age = $related['age'];
       $Staff->birthdate = $related['bitrhdate'];
       $Staff->workhours = $related['workhours'];
      
       
       return $Staff;
    }
    
    public function Updateprofile(Staff $s)
{
    $dat = new database();
    
    $data['Fname'] = $s->Fname;
    $data['Lname'] = $s->Lname;
    $data['username'] = $s->username;
    $data['password'] = $s->Password;
    
   
    
    $dat->update("user", $data, "ID = '$this->ID'");
     
    $data2['ssn'] = $s->ssn;
    $data2['salary'] = $s->salary;
    $data2['age'] = $s->age;
    $data2['bitrhdate'] = $s->birthdate;
    $data2['workhours'] = $s->workhours;
    
    
    
    $dat->update("staff", $data2, "user_id = '$this->ID'");
}

public function numbercleanroom ()
{
   $object = new database();
   $c_date = new DateTime();
      $c_date->modify('-0 day');
       $date = $c_date->format('Y-m-d');
       
   $query = "SELECT roomnum FROM room  JOIN userroom ON room.ID=userroom.room_id  JOIN guist ON userroom.user_id=guist.user_id  WHERE checkoutdate = '$date'";
        
        $result = $object->query($query);
        $all = $object->database_num_rows($result);
      

        return $all;
        
}


public function updatecleaned ($roomnum)
{
    $dat = new database();  
     
      $data['state_id'] = 1;
      $data['state_clean_id'] = 5;
      $dat->update("room", $data, "roomnum = '$roomnum'");
}

public function deleteroomguest($roomnum)
{
      $dat = new database(); 
     
      $query = "SELECT ID FROM room WHERE roomnum ='$roomnum'";
      $query2  = $dat->query($query);
      $related = $dat->query_associ($query2);
     
       $idroom = $related['ID'];
       
       $dat->delete("userroom", "room_id  = '$idroom'");
}

public function all ()
{
   $object = new database();
   $c_date = new DateTime();
      $c_date->modify('-1 day');
       $date = $c_date->format('Y-m-d');
      
       echo '<br>';
       $array = array();

    $query = "SELECT roomnum FROM room INNER JOIN userroom ON ID=room_id INNER JOIN guist ON userroom.user_id=guist.user_id  WHERE checkoutdate = '$date'";
        
        $result = $object->query($query);
        while($row = $object->query_associ($result)){
            $userid =  $row['roomnum'];
            echo $userid;
            //$array[] = $row;
            
}
//return $array;
}
    
}
