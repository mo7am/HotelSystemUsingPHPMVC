<?php
session_start();
include_once '../models/guest.php'; 
include_once '../models/room.php'; 
include_once '../models/Staff.php'; 

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Clean")
    {
        $staff = new Staff();
        $roomnumber =  $_SESSION['roomnom'];
        echo $roomnumber;
        $staff->updatecleaned($roomnumber);
        $staff->deleteroomguest($roomnumber);
        
        header('Location: http://localhost:8080/hotel/view/index5.php');
    }
    
}
