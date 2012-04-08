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
    <label>Phone Numbers (each one on a new line, it works to just copy a column from google docs)</label>
    <textarea name="numbers"></textarea>
    <label>Message (160 characters)</label>
    <textarea name="message"></textarea>
    <input type="submit"/>
    
</form>

