<?php
include_once '../models/Staff.php';
include_once '../models/guest.php'; 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manager
 *
 * @author HP
 */
class Manager extends Staff{
 
    
     public function Addstaff(Staff $S)
    {
    
        $dat = new database();
             $data['Fname'] = $S->Fname;
             $data['Lname'] = $S->Lname;
             $data['username'] = $S->username;
             $data['password'] = $S->Password;
             $data['type_id'] = $S->type_id;
             $data['balance'] = $S->balance;
             
         $dat->insert('user', $data); 
     
          $query = "SELECT ID FROM `user` WHERE username = '$S->username'";
        
        $result = $dat->query($query);
        $id = $dat->query_associ($result);
        
        
        
         $data3['ssn'] = $S->ssn;
         $data3['salary'] = $S->salary;
         $data3['age'] = $S->age;
         $data3['bitrhdate'] = $S->birthdate;
         $data3['workhours'] = $S->workhours;
         
         $data3['user_id'] = $id['ID'];
         $dat->insert('staff', $data3); 
   
    }
    
    
    public function getstaffdata($username) {
     $dat = new database();
     $staff = new Staff(); 
     
      $query = "SELECT * FROM user WHERE username ='$username'";
      $query2 = $dat->query($query);
      $related = $dat->query_associ($query2);
      $staff->ID = $related['ID'];
      $query1 = "SELECT * FROM staff WHERE user_id ='$staff->ID'";
      $query3 = $dat->query($query1);
      $related2 = $dat->query_associ($query3);
       
      
       
       $staff->Fname = $related['Fname'];
       $staff->Lname = $related['Lname'];
       $staff->username = $related['username'];
       $staff->Password = $related['password'];
       $staff->balance = $related['balance'];
       
       $typeid = $related['type_id'];
       $query9 = "SELECT type FROM usertype WHERE ID ='$typeid'";
       $query6 = $dat->query($query9);
       $related4 = $dat->query_associ($query6);
       
       $staff->type_id = $related4['type'];
       
       
       $staff->ssn = $related2['ssn'];
       $staff->salary = $related2['salary'];
       $staff->age = $related2['age'];
       $staff->birthdate = $related2['bitrhdate'];
       $staff->workhours = $related2['workhours'];
       
      
       
       return $staff;
}


public function deletestaff($username)
    {
        $dat = new database();
        $guest = new guest();
        $userid =  $guest->get_id_of_user($username);
        $dat->delete("user", "username = '$username'");
        $dat->delete("staff", "user_id = '$userid'");
    }
}
