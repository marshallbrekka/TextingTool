<pre>
<?php
require 'php/NumberParser.php';
require 'php/Mail.php';

$p = new NumberParser();
if($_POST['numbers'] != null) {
    $emails = $p->buildEmails($_POST['numbers']);
    $from = "KleinLieuForASUCSenate@gmail.com";
    $mail = new Mail();
    foreach($emails as $email) {
        $mail->sendMail($from, $email, $_REQUEST['message']);
    }
    
}




?>
</pre>
<form method="post">
    <label>Phone Numbers (each one on a new line, it works to just copy a column from google docs)</label><br/>
    <textarea name="numbers"></textarea><br/>
    <label>Message (160 characters) Include bit.ly/asuc2012 in the message for a trackable link to the asuc elections page</label><br/>
    <textarea name="message"></textarea><br/>
    <input type="submit"/>
    
</form>

