<?php
session_start();
include_once '../models/guest.php'; 
include_once '../models/room.php'; 

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Check")
    {
      $guest = new guest();
       $guest->check();
      header("Location:http://localhost:8080/hotel/view/index2.php");
    }
}
