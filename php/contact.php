<?php 
	

	// sender information
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$message = trim($_POST['message']);
	$error = "";
	
	$email_from = 'smc21722@gmail.com';

	$email_subject = 'New Contact From Website';

	$email_body = "User Name: $name.\n".
					"User Email: $email.\n".
						"User Message: $message.\n";

	$to = "smprovence22@gmail.com";

	$headers = "From: $email_from \r\n";

	$headers = "Reply-To: $email \r\n";

	mail($to, $email_subject, $email_body, $headers);

	header("Location: index.html");
?>