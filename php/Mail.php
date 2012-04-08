<?php
$songNames = array(
	'Dog Days Are Over',
	'Finally Moving',
	'Harder Better Faster Stronger',
	'Home',
	'I\'m Yours',
	'Little Secrets',
	'Pap Smear',
	'Set Me On Fire',
	'Sleepyhead',
	'The High Road',
	'The Remedy',
	'The Science of Selling Yourself Short'
	);
	//$to = 'marshallsmedia@gmail.com';
	//$to = '8313255260@vzwpix.com';
	//$to = '8312125509@vzwpix.com';
	//$to = '8313590554@vzwpix.com';
	$to = '8313255260@vtext.com';
	$to = '5622796701@txt.att.net';
	//$to = '6614963201@vzwpix.com';



class Mail {
    
	private $from;
	private $to;
	
	
	public function __construct($from, $to) {
		$this->songIndex = $index;
		$this->songFileNames = $songs;
		$this->from = $from;
		$this->to = $to;
		$this->sendMail();
	}
	
	function sendMail() {
		
		$email_from = $this->from;
		
		$email_subject = ""; 
		$email_txt = "";  

		$email_to = $this->to;

		$headers = "From: ".$email_from . "\r\n" .
    'Reply-To: 8313255260'; 

		

		
		$email_message = "Hey girl, I heard you're into some male dancing action, how about we go \"out\" sometime and I show you my \"skills\" ;) - Jeff";

		$ok = @mail($email_to, $email_subject, $email_message, $headers, "-f$email_from");
		if($ok) { 
		echo "true"; 
		} else { 
		echo ("false"); 
		}
	}
	
}
?>
