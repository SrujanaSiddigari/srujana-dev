<?php
$to = "siddigarisru@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: bhoomi@gkblabs.com" . "\r\n";

if (mail($to,$subject,$txt,$headers)) {
 echo 'sent';
} else {
 echo 'not sent';
}
?>