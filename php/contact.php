<?php 
	// require('email_config.php');
	

	// sender information
	// $name = trim($_POST['name']);
	// $email = trim($_POST['email']);
	// $message = trim($_POST['message']);
	// $error = "";
	
	// // check sender information
	// $pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
	// if(!preg_match_all($pattern, $email, $out)) {
	// 	$error = $invalid_email; // for invalid email
	// }
	// if(!$email) {
	// 	$error = $invalid_email; // for empty email field
	// }	
	// if(!$message) {
	// 	$error = $invalid_message; // for empty message field
	// }
	// if (!$name) {
	// 	$error = $invalid_name; // for empty name field
	// }

    // // email header

	// $headers = "From: ".$name." <".$email.">\r\nReply-To: ".$email."";

	// if (!$error){
		
	// 	// sending email
	// 	$sent = mail($to_email,$subject,$message,$headers); 
		
	// 	if ($sent) {
	// 			// if message sent successfully
	// 			echo "SEND"; 
	// 		} else {
	// 			// error message
	// 			echo $sending_error; 
	// 		}
	// } else {
	// 	echo $error; // error message
	// }

	$mail_to = 'smprovence22@gmail.com'; // specify your email here

    // Assigning data from the $_POST array to variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Construct email subject
    $subject = 'Message from FSD Portfolio from ' . $name;

    // Construct email body
    $body_message = 'From: ' . $name . "\r\n";
    $body_message .= 'E-mail: ' . $email . "\r\n";
    $body_message .= 'Message: ' . $message;

    // Construct email headers
    $headers = 'From: ' . $email . "\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";

    $mail_sent = mail($mail_to, $subject, $body_message, $headers);

    if ($mail_sent == true){ ?>
        <script language="javascript" type="text/javascript">
        alert('Thank you for the message. We will contact you shortly.');
        window.location = 'index.html';
        </script>
    <?php } else { ?>
    <script language="javascript" type="text/javascript">
        alert('Message not sent. Please, notify the site administrator admin@admin.com');
        window.location = 'index.html';
    </script>
    <?php
    }
?>