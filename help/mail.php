<?php $name = $_POST['name'];
$surname = $_['surname'];
$email = $_POST['email'];
$phone = $_Post['phone'];
$message = $_POST['message'];
$formcontent="From: $name $surname \n Message: $message \n Email: $email \n Phone: $phone";
$recipient = "adam.branscum@lamanlibrary.org";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>