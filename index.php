<pre>
<?php
require 'php/NumberParser.php';

$p = new NumberParser();
if($_POST['numbers'] != null) {
    print_r($p->buildEmails($_POST['numbers']));
}




?>
</pre>
<form method="post">
    <textarea name="numbers"></textarea>
    <input type="submit"/>
    
</form>
