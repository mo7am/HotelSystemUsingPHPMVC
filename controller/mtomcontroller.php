<?php
session_start();

if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Receptionist")
    {
       $_SESSION['reception'] =  "Receptionist";
       echo $_SESSION['reception'];
       header("Location:http://localhost:8080/hotel/view/sendmessage.php");
    }
    
    else if(isset($_POST['submit'])AND $_POST ['submit']=="Service")
    {
       $_SESSION['reception'] =  "Service";
       echo $_SESSION['reception'];
       header("Location:http://localhost:8080/hotel/view/sendmessage.php");
    }
    else if(isset($_POST['submit'])AND $_POST ['submit']=="Guest")
    {
       $_SESSION['reception'] =  "Guest";
       echo $_SESSION['reception'];
       header("Location:http://localhost:8080/hotel/view/sendmessage.php");
    }
}