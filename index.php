<pre>
<?php
require 'php/NumberParser.php';

$p = new NumberParser();
if($_POST['numbers'] != null) {
    print_r($p->buildEmails($_POST['numbers']));
}




?>
</pre>
<form>
    <textarea name="numbers" />
    <input type="submit"/>
    
</form>
