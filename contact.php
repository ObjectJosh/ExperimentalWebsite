<?php
	// echo "<pre>";
	// print_r($POST);
	// echo "/pre";
	$name = $_POST['contact_name'];
	$email = $_POST['contact_email'];
	$message = $_POST['contact_message'];
	$email_from = 'joshwong74@gmail.com';
	$email_subject = "New Form Submission";
	$email_body .= "From: ".$name. "\r\n";
	$email_body .= "Email: ".$email. "\r\n";
	$email_body .= "Message ".$message. "\r\n";

	$to = "joshw8102@gmail.com";
	$headers .= "From: $email_from \r\n";
	$headers .= "Reply-To: $email";
	
	if(mail($to,$email_subject,$email_body,$headers)){
		echo "Email successfully sent to $to";
	}else{
		echo "Email sending failed";
	}
	// header("Location: contact.html");
?>