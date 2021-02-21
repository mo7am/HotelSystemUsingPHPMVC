<?php
session_start();

include_once '../models/Login.php'; 
include_once '../models/guest.php'; 
include_once '../models/User.php'; 
include_once '../models/message.php';

if($_POST)
{
     
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Send")
    {
       $guest = new guest();
       $message = new message();
       $user = new User();
       $usersender =  $guest->get_username_of_user($_SESSION['usersender']);
       $_SESSION['usernamesender'] = $usersender;
       echo $_SESSION['usernamesender'];
       
       $idsender = $guest->get_id_of_user($_SESSION['username']);
     
     
       
       $message->sender_id = $idsender;
       echo $message->sender_id;
       echo '<br>';
       $idreceiver = $guest->get_id_of_user($_SESSION['usernamesender']);
       $message->receiver_id = $idreceiver;
       echo $message->receiver_id;
       echo '<br>';
       $message->content = $_POST['message'];
       echo $message->content;
       echo '<br>';
       $message->state_id = "4";
       echo $message->state_id;
       echo '<br>';
       $date = date('Y-m-d');
       $dateid = $user->checkdate($date);
       $message->date_id = $dateid;
       echo $message->date_id;
       echo '<br>';
        $Time = date ('h:i:s'); 
       $message->time = $Time;
       $user->sendmessage($message);
       
       header("Location:http://localhost:8080/hotel/view/replaymessage.php");
    }
    
    
    
}

