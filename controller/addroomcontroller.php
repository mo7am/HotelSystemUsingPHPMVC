<?php
session_start();
include_once '../models/guest.php'; 
include_once '../models/room.php'; 

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Send")
    {
        $guest = new guest();
        $rom = new room();
        $username = $_POST['user'];
        $iduser = $guest->get_id_of_user($username);
        if($guest->gettyperoom($iduser)== 0){
        $idtype = $guest->get_type_of_room($_POST['room']);
        
        $checkindate = $_POST['checkin'];
        $checkoutdate = $_POST['checkout'];
        
        $guest->updateroomtype($idtype, $iduser,$checkindate,$checkoutdate);
        
        $rom2 = $guest->getdataaboutroom($_POST['room']);
        $rom->user_id = $guest->get_id_of_user($username);
        $rom->ID = $rom2->ID;
        
        $_SESSION['roomnumber'] = $rom2->roomnum;
       
        $guest->registroom($rom);
       
             header('Location: http://localhost:8080/hotel/view/addroom.php');      
        }
 else {
     $message = "This Account Submit Room Before";
     echo "<script type='text/javascript'>alert('$message');</script>";
 }
       
    }
    
}
