<?php 
	// require('email_config.php');
	
	if (isset($_POST['$name']) && isset($_POST['email']) && isset($_POST['message'])){
	// sender information
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$message = trim($_POST['message']);
		$to_email = 'smprovence22@gmail.com';
		$subject = 'Contact from your website';	
		$error = "";

		//Error Messages
		$invalid_name = 'Please enter your name.';
		$invalid_email = 'Please enter valid e-mail.';
		$invalid_message = 'Please enter your message.';
		$sending_error = 'Sorry, we can\'t send your message.';
		
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
			$send = mail($to_email,$subject,$message,$headers); 
			
			if ($send) {
					// if message sent successfully
					echo "SEND"; 
				} else {
					// error message
					echo $sending_error; 
				}
		} else {
			echo $error; // error message
		}
	}
?>