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
       $idsender = $guest->get_id_of_user($_SESSION['username']);
     
     
       
       $message->sender_id = $idsender;
       echo $message->sender_id;
       echo '<br>';
       $idreceiver = $guest->get_id_of_user($_POST['user']);
       $message->receiver_id = $idreceiver;
       echo $message->receiver_id;
       echo '<br>';
       $message->content = $_POST['message'];
       echo $message->content;
       echo '<br>';
       $message->state_id = "4";
       echo $message->state_id;
       echo '<br>';
       $date =new DateTime();
       $date->modify('-3 day');
       $currentdate = $date->format('Y-m-d');
       echo $currentdate;
       $dateid = $user->checkdate($currentdate);
       $message->date_id = $dateid;
       echo $message->date_id;
       echo '<br>';
       $Time = date ('h:i:s'); 
       $message->time = $Time;
       $user->sendmessage($message);
       
       header("Location:http://localhost:8080/hotel/view/sendmessagerecept.php");
    }
    
    
    
}

