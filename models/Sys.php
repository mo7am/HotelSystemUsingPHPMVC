<?php
include_once '../models/database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sys
 *
 * @author mohamedsalah
 */
class Sys {
    
    public function get_name_of_user($username)
    {
        $object =  new database();
        $query = "SELECT Fname , Lname FROM `user` WHERE username = '$username'";
        
        $result = $object->query($query);
        $fname = $object->query_associ($result);
       
   
        return $fname['Fname']."  ".$fname['Lname'];
    
    
}

  public function get_name_of_user_by_id($id)
    {
        $object =  new database();
        $query = "SELECT Fname , Lname FROM `user` WHERE ID = '$id'";
        
        $result = $object->query($query);
        $fname = $object->query_associ($result);
       
   
        return $fname['Fname']."  ".$fname['Lname'];
    
    
}

 function checkUser($userData = array()){
        if(!empty($userData)){
            $object =  new database();
            // Check whether user data already exists in database
            $prevQuery = "SELECT * FROM user WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $object->query($prevQuery);
            
            if($prevResult->num_rows > 0){
                // Update user data if already exists
                $query = "UPDATE user SET Fname = '".$userData['Fname']."', Lname = '".$userData['Lname']."', username = '".$userData['username']."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
            }else{
                // Insert user data
                $query = "INSERT INTO user SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', Fname = '".$userData['Fname']."', Lname = '".$userData['Lname']."', username = '".$userData['username']."'";
                $insert = $object->query($query);
            }
            
            // Get user data from the database
            $result = $object->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        // Return user data
        return $userData;
    }
}

