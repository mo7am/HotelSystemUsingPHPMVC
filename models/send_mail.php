<!DOCTYPE html>
<html>
<head>
	<title>Send HTML Email from Localhost using PHP and PHPMailer</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body bgcolor="#6ba2f9">
<div class="container">
	<div class="row">
		<h1>Send HTML Email from Localhost using PHP and PHPMailer</h1>
		<div class="col-md-6">
			<?php
			if(isset($_POST['submit'])AND $_POST ['submit']=="SendMessage")
    { 
				$email = $_POST['email'];
				require 'PHPMailer-master/PHPMailerAutoload.php';
				$mail = new PHPMailer;

				$mail->isSMTP();                                   // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                            // Enable SMTP authentication
				$mail->Username = 'eng.mohamed161996@gmail.com';          // SMTP username
				$mail->Password = 'fcih2014'; // SMTP password
				$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;                                 // TCP port to connect to

				$mail->setFrom('hotel@gmail.com', 'Weidea4u');
				$mail->addReplyTo('hotel@gmail.com', 'Weidea4u');
				$mail->addAddress($email);   // Add a recipient
				//$mail->addCC('cc@example.com');
				//$mail->addBCC('bcc@example.com');

				$mail->isHTML(true);  // Set email format to HTML

				$bodyContent = '<h1>How to Send HTML Email using PHP in Localhost by Weidea4u</h1>';
				$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>Weidea4u</b></p>';

				$mail->Subject = 'Email from Localhost by Weidea4u';
				$mail->Body    = $bodyContent;

				if(!$mail->send()) {
				    ?>
				    <div class="alert alert-danger alert-dismissable fade in">
				   	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   		Message could not be sent.
				   	</div>
				    <?php
				} else {
				    ?>
				   	<div class="alert alert-success alert-dismissable fade in">
				   	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   		Message has been sent
				   	</div>
				    <?php
				}
			}
			?>
			<form action="" method="post">
				<div class="form-group">
					<label class="control-label">Enter Email Address: </label>
					<input type="text" name="email" class="form-control" placeholder="Enter Email" required>
				</div>

				<div class="form-group">
					<input type="submit" name="submit" value="SendMessage" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>