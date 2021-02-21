<?php
session_start();
include_once '../models/guest.php';
include_once '../models/room.php'; 

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Create")
    {
        
        
         $_SESSION['fname'] = $_POST['FirstName'];
         $_SESSION['lname'] = $_POST['Lastname'];
         $_SESSION['username'] = $_POST['Email'];
         $_SESSION['password'] = $_POST['password'];
         $_SESSION['city'] = $_POST['city'];
         $_SESSION['nationality'] = $_POST['nationality'];
        
          $_SESSION['usernamee'] = $_POST['Email'];
        
       $guest = new guest();
       $rom = new room();
       $guest->Fname = $_POST['FirstName'];
       $guest->Lname = $_POST['Lastname'];
       $guest->username = $_POST['Email'];
       $guest->Password = $_POST['password'];
       $guest->balance = 0;
       $id = $guest->get_type_of_user($_POST['guest']);
       $guest->type_id = $id;
       $guest->checkindate = 0;
       $guest->checkoutdate = 0;
       $guest->city = $_POST['city'];
       $guest->nationality = $_POST['nationality'];
     
//       $idtype = $guest->get_type_of_room($_POST['room']);
       
       $guest->roomtype_id = 0;
       
       $user = $guest->checkusername($_POST['Email']);
    
       if($user!=null)
       {
          $message = "this email is already exist ";
          //echo "<script type='text/javascript'>alert('$message');</script>";
          echo $message;
       }else{
    
       $guest->Regist($guest);
       
       header('Location: http://localhost:8080/hotel/view/addguest.php');
       }
       
    }
}