<?php
session_start();
if(session_destroy())
{
header('Location: http://localhost:8080/hotel/view/login.php');
}
?>