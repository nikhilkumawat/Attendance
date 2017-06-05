<?php
$ToEmail = 'nikhilkumawatnk67@gmail.com';
$EmailSubject = 'Site contact form';
$mailheader = "Form: ".$_POST["email"];
$mailheader .= "Reply-To ".$_POST["email"]."\r\n";
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
$MESSAGE_BODY = "Name: ".$_POST["name"]."</br>";
$MESSAGE_BODY .= "Email: ".$_POST["email"]."</br>";
$MESSAGE_BODY .= "Comment: ".nl2br($_POST["msg"])."</br>";
 


?>
