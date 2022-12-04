<?php
$to_email = "susantripathee@gmail.com";
$subject = "Sensors not working properly!!!";
$body = "New! There is some error in your farm, please visit dashboard. for more info";
$headers = "From: sushanttripathee1154@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>