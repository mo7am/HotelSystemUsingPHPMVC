<?php
session_start();
include_once '../models/guest.php'; 
include_once '../models/Manager.php'; 

if($_POST)
{
     if(isset($_POST['submit'])AND $_POST ['submit']=="Search")
    {
      $guest = new guest();
      $manager = new Manager();
      $username = $_POST['userstaff'];
       
      $data2 = $manager->getstaffdata($username);
         $_SESSION['fname1'] = $data2->Fname;
         $_SESSION['lname1'] = $data2->Lname;
         $_SESSION['username1'] = $data2->username;
         $_SESSION['password1'] = $data2->Password;
         $_SESSION['balance1'] = $data2->balance;
         $_SESSION['type1'] = $data2->type_id;
         $_SESSION['ssn1'] = $data2->ssn;
         $_SESSION['salary1'] = $data2->salary;
         $_SESSION['age1'] = $data2->age;
         $_SESSION['birthdate1'] = $data2->birthdate;
         $_SESSION['workhours1'] = $data2->workhours;
         
        
      header('Location: http://localhost/mohamed/view/searchstaff.php');
    }
    
    else if(isset($_POST['submit'])AND $_POST ['submit']=="Delete")
    {
        $manager = new Manager();
        $username = $_SESSION['username1'];
        echo $username;
       $manager->deletestaff($username); 
       
       header('Location: http://localhost:8080/hotel/view/searchstaff.php');
    }
    
    else
    {
      
        $staff = new Staff();
        $guest = new guest();
        $username = $_SESSION['username1'];
        echo $username;
        $staff->ID = $guest->get_id_of_user($username);
        $staff->Fname = $_POST['FirstName'];
        $staff->Lname = $_POST['Lastname'];
        $staff->username = $_POST['Email'];
        $staff->Password = $_POST['password'];
        $staff->ssn = $_POST['ssn'];
        $staff->salary = $_POST['salary'];
        $staff->age = $_POST['Age'];
        $staff->birthdate = $_POST['Birthdate'];
        $staff->workhours = $_POST['workhours'];
        
        $staff->Updateprofile($staff);
        
       header('Location: http://localhost:8080/hotel/view/searchstaff.php');
    }
}