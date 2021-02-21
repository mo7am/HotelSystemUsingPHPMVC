<?php
session_start();
include_once '../models/guest.php'; 
include_once '../models/room.php'; 

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Add")
    {
        $guest = new guest();
        $username = $_POST['user'];
        $date = $_POST['checkout'];
        $guest->addmoreday($username, $date);
        
        header("Location:http://localhost:8080/hotel/view/moreday.php");

    }
}