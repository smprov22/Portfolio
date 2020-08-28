<?php 
	

	// sender information
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$message = trim($_POST['message']);
	$error = "";
	
	$email_from = 'smc21722@yahoo.com';

	$email_subject = 'New Contact From Website';

	$email_body = "User Name: $name.\n".
					"User Email: $email.\n".
						"User Message: $message.\n";

	$to = "smprovence22@gmail.com";

	$headers = "From: $email_from \r\n";

	$headers = "Reply-To: $email \r\n";

	mail($to, $email_subject, $email_body, $headers);

	header("Location: ../index.html");

// check sender information
	$pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
	if(!preg_match_all($pattern, $email, $out)) {
		$error = $invalid_email; // for invalid email
	}
	if(!$email) {
		$error = $invalid_email; // for empty email field
	}	
	if(!$message) {
		$error = $invalid_message; // for empty message field
	}
	if (!$name) {
		$error = $invalid_name; // for empty name field
	}

    // email header

	$headers = "From: ".$name." <".$email.">\r\nReply-To: ".$email."";

	if (!$error){

		// sending email
		$sent = mail($to_email,$subject,$message,$headers); 

		if ($sent) {
				// if message sent successfully
				echo "SEND"; 
			} else {
				// error message
				echo $sending_error; 
			}
	} else {
		echo $error; // error message
	}