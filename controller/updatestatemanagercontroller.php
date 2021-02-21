<?php
session_start();

include_once '../models/Login.php'; 
include_once '../models/guest.php'; 
include_once '../models/User.php'; 
include_once '../models/message.php';

if($_POST)
{
     
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Replay")
    {
       $guest = new guest();
       
       $user = new User();
       $usersender =  $guest->get_username_of_user($_SESSION['usersender']);
       $_SESSION['usernamesender'] = $usersender;
      
     
     
       $idsender = $guest->get_id_of_user($_SESSION['username']);
       echo $idsender;  
       echo '<br>';
       
       $messageid = $user->idofmessage($idsender);
       echo $messageid;
       echo '<br>';
      $user->updatestate($messageid);
       
       header("Location:http://localhost:8080/hotel/view/replaymessagemanager.php");
    }
    
    
    
    
}

