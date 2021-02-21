 <?php
 

session_start();

include_once '../htdocs/database.php';

/*if(!isset( $_SESSION['username']))
{
    include 'Login.php';
    die();
}*/



if($_POST)
{
    
    if(isset($_POST['submit'])AND $_POST ['submit']=="Send")
    {
$name = $_POST["user"];
$email = $_POST["email"];
$msg = $_POST["msg"];

if(empty($name) || empty($email) || empty($msg)){
die("You Need TO Fill THe Form!");
}


$dat = new database();
$sql = "INSERT INTO users (id, name, email, message) VALUES (NULL, '$name', '$email', '$msg')";
$dat->query($sql); // تنفيذ

echo "Success!";
}

}