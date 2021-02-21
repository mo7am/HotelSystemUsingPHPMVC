<?php
session_start();
include_once '../models/Login.php'; 
include_once '../models/Sys.php'; 
include_once '../models/User.php'; 
include_once '../models/guest.php';
include_once '../models/Staff.php';

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="SIGN")
    {
        $guest = new guest(); 
        $user = new User();
        $fname = new Sys();
        $Staff = new Staff(); 
         $data['username'] = $_POST['username'];
         $data['Password'] = $_POST['password'];
         $username = $_POST['username'];
//       
         $_SESSION['cleanroom'] = $Staff->numbercleanroom();
         
                                      
         $idsender = $guest->get_id_of_user($username);
//                                      
                                       $message = $user->receivemessage($idsender);
//                                       
                                       $_SESSION['usersender'] = $message->sender_id;
                                        
                                         $roomnum = $guest->getroomnum($username);
                                         $_SESSION['roomnumber'] = $roomnum;
         
         $_SESSION['F&Lname'] = $fname->get_name_of_user($username);
         
         $data2 = $guest->getalldata($username);
         $data3 = $Staff->getstaffdata($idsender);
         $_SESSION['fname'] = $data2->Fname;
         $_SESSION['lname'] = $data2->Lname;
         $_SESSION['username'] = $data2->username;
         $_SESSION['password'] = $data2->Password;
         $_SESSION['city'] = $data2->city;
         $_SESSION['nationality'] = $data2->nationality;
         
         $_SESSION['ssn'] = $data3->ssn;
         
         $_SESSION['salary'] = $data3->salary;
         $_SESSION['age'] = $data3->age;
         $_SESSION['bitrhdate'] = $data3->birthdate;
         $_SESSION['workhours'] = $data3->workhours;
         
        if(empty($data['username']) or empty($data['Password']))
        {
            
            header("Location:http://localhost:8080/hotel/view/login.php");
            
            
        }else{
        //$login = new Login($data);
        $user = new User();
        $user->username = $data['username'];
        $user->Password = $data['Password'];
        
          if(!$user->login($user->username, $user->Password))
          {
              header("Location:http://localhost:8080/hotel/view/login.php");
          }else{
              $user->login($user->username, $user->Password);
          }
        }
    }
    
}

 /* try{
   
    include '../models/database.php'; 
    $var = "../include/variable.php";
    new database($var);
    
   } catch (Exception $ex) {
       echo $exc->getMessage();
   }*/
 