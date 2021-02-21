<?php
session_start();
include_once '../models/Manager.php'; 

include_once '../models/guest.php'; 

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Create")
    {
        
 
        
        
       $manager = new Manager();
       $guest = new guest();
       $manager->Fname = $_POST['FirstName'];
       $manager->Lname = $_POST['Lastname'];
       $manager->username = $_POST['Email'];
       $manager->Password = $_POST['password'];
       $manager->balance = 0;
       $id = $guest->get_type_of_user($_POST['staff']);
       $manager->type_id = $id;
       $manager->ssn = $_POST['ssn'];;
       $manager->salary = $_POST['salary'];;
       $manager->age = $_POST['Age'];
       $manager->birthdate = $_POST['Birthdate'];
     
       //$idtype = $guest->get_type_of_room($_POST['room']);
       
       $manager->workhours = $_POST['workhours'];;
       
       
       $user = $guest->checkusername($_POST['Email']);
    
       if($user!=null)
       {
          $message = "this email is already exist ";
          //echo "<script type='text/javascript'>alert('$message');</script>";
          echo $message;
       }else{
    
       $manager->Addstaff($manager);
       
       header('Location: http://localhost:8080/hotel/view/addstaff.php');
       }
       
    }
}   