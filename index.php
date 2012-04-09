
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
    echo '<p>Messages Sent</p>';
}




?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<form method="post">
    <label>Phone Numbers (each one on a new line, it works to just copy a column from google docs)</label><br/>
    <textarea name="numbers" rows="5"></textarea><br/>
    <label>Message (160 characters) Include <b>www.bit.ly/asuc2012</b> in the message for a trackable link to the asuc elections page</label><br/>
    <textarea id="message" name="message" rows="5"></textarea><br/>
    <p>Characters Remaining: <span>160</span></p>
    <input type="submit"/>
    
</form>

<script type="text/javascript">


$(document).ready(function(){
    

    var max_length = 160;
 
    //run listen key press
    whenkeydown(max_length);
    $('form').submit(function() {
        return r = confirm("Are you sure you want to send this message?");
        
    })

 });
 
 
var whenkeydown = function(max_length)
{
    $("#message").unbind().keyup(function()
    {
        //check if the appropriate text area is being typed into
        if(document.activeElement.id === "message")
        {
            //get the data in the field
            var text = $(this).val();
 
            //set number of characters
            var numofchars = text.length;
 
            //set the chars left
            var chars_left = max_length - numofchars;
 
            //check if we are still within our maximum number of characters or not
            if(numofchars <= max_length)
            {
                //set the length of the text into the counter span
                $("p span").html("").html(chars_left).css("color", "#000000");
            }
            else
            {
                //style numbers in red
                $("#message").val(text.substr(0, max_length));
            }
        }
    });
}
    
</script>

