<?php

class Mail {
    
	private $from;
	private $to;
	
	
	
	function sendMail($from, $to, $message) {
		
		$email_from = $from;
		
		$email_subject = ""; 
 

		$email_to = $to;

		$headers = "From: " . $email_from; 

		

		
	
		return mail($email_to, $email_subject, $message, $headers, "-f$email_from");
		
	}
	
}
?>
