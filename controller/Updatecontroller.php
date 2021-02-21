<?php
session_start();
include_once '../models/Login.php'; 
include_once '../models/Sys.php'; 
include_once '../models/User.php'; 
include_once '../models/guest.php';

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Update")
    {
        $guest = new guest();
        
        $guest->ID = $guest->get_id_of_user($_POST['Email']);
        $guest->Fname = $_POST['FirstName'];
        $guest->Lname = $_POST['Lastname'];
        $guest->username = $_POST['Email'];
        $guest->Password = $_POST['password'];
        $guest->city = $_POST['city'];
        $guest->nationality = $_POST['nationality'];
        
        $guest->Updateprofile($guest);
        
        header("Location:http://localhost:8080/hotel/view/profileguest.php");
    }
    
//   else if(isset($_POST['submit'])AND $_POST ['submit']=="Delete")
//    {
//         $guest = new guest();
//         $id = $guest->get_id_of_user($_POST['Email']);
//         $guest->Delete($id);
//    }
}
