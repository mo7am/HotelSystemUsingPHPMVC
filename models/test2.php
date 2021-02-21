<?php 
session_start();
include_once '../models/guest.php';
include_once '../models/User.php'; 
include_once '../models/database.php';
include_once '../models/Sys.php';
/*if(!isset( $_SESSION['username']))
{
    include 'Login.php';
    die();
}*/
?>
<!DOCTYPE html>
<html>
<head>
<title>Creative - Messages</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/.../css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/.../css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/.../jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/.../js/bootstrap.min.js"></script>
</head>

<body>
<div class="jumbotron text-center">
<h1>Messages Table</h1>
<p>This Page Sponsored By <kbd>@Maram</kbd></p>
</div>
<div class="container">
<table class="table table-bordered text-center table-striped">
<thead>
<tr class="info">
<th class="text-center">ID</th>
<th class="text-center">Name</th>
<th class="text-center">E-Mail</th>
<th class="text-center">Message</th>
</tr>
</thead>
<tbody>
<?php
$base = new database();
$sql = "SELECT * FROM user";
$res = $base->query($sql);
while($data = $res->fetch_assoc()){

$id = $data["ID"];
$name = $data["Fname"];
$email = $data["username"];
$msg = $data["password"];

echo "<tr> <td>$id</td> <td>$name</td> <td>$email</td> <td>$msg</td> </tr>";
}
?>
</tbody>
</table>
</div>
</body>
</html>