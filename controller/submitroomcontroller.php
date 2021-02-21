<?php
session_start();
include_once '../models/guest.php'; 
include_once '../models/room.php'; 

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Submit")
    {
        $guest = new guest();
        $guest->updatestateroom($_SESSION['roomnumber']);
        $guest->updatestatecleanroom($_SESSION['roomnumber']);
        header('Location: http://localhost:8080/hotel/view/index4.php');
    }
    
}