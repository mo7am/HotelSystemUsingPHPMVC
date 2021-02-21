<?php
session_start();
include_once '../models/guest.php'; 

if($_POST)
{
     if(isset($_POST['submit'])AND $_POST ['submit']=="Search")
    {
      $guest = new guest();
      $username = $_POST['userguest'];
      $data2 = $guest->getalldata($username);
         $_SESSION['fname1'] = $data2->Fname;
         $_SESSION['lname1'] = $data2->Lname;
         $_SESSION['username1'] = $data2->username;
         $_SESSION['balance1'] = $data2->balance;
         $_SESSION['type1'] = $data2->type_id;
         $_SESSION['city1'] = $data2->city;
         $_SESSION['nationality1'] = $data2->nationality;
         $_SESSION['checkindate1'] = $data2->checkindate;
         $_SESSION['checkoutdate1'] = $data2->checkoutdate;
         $_SESSION['roomtype1'] = $data2->roomtype_id;
         
         header('Location: http://localhost:8080/hotel/view/searchguest.php');
      
    }
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Delete")
    {
        $guest = new guest();
        $username = $_SESSION['username1'];
        echo $username;
       $guest->deleteguest($username); 
       
       header('Location: http://localhost:8080/hotel/view/searchguest.php');
    }
}