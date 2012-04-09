<?php

require 'Mail.php';

$m = new Mail();
$m->sendMail('it@caldems.com', 'marshallsmedia@gmail.com', 'test message');
?>
