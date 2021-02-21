<?php
session_start();
include_once '../models/Login.php'; 
include_once '../models/Sys.php'; 
include_once '../models/User.php'; 
include_once '../models/guest.php';
include_once '../models/Staff.php';

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Update")
    {
        $staff = new Staff();
        $guest = new guest();
        
        $staff->ID = $guest->get_id_of_user($_POST['Email']);
        $staff->Fname = $_POST['FirstName'];
        $staff->Lname = $_POST['Lastname'];
        $staff->username = $_POST['Email'];
        $staff->Password = $_POST['password'];
        $staff->age = $_POST['Age'];
        $staff->birthdate = $_POST['Birthdate'];
        
        $staff->Updateprofile($staff);
        
        header("Location:http://localhost:8080/hotel/view/profilehousekeeping.php");
    }
    
//   else if(isset($_POST['submit'])AND $_POST ['submit']=="Delete")
//    {
//         $guest = new guest();
//         $id = $guest->get_id_of_user($_POST['Email']);
//         $guest->Delete($id);
//    }
}
