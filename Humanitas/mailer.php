<?php
/* Set e-mail recipient */
$myemail = "shivam.bharuka@gmail.com";
$name = $_POST['inputName'];
$email = $_POST['inputEmail'];
$message = $_POST['inputMessage'];

$from = $_POST['email']; // added
$headers = "From: ".$from; // added

if (!$_POST['inputName']) {
      $errName = '<div class="error"> Sorry, your name is rquired</div>';
    }
// Check if email has been entered and is valid
if (!$_POST['inputEmail'] || !filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = '<div class="error"> Sorry, your email is rquired</div>';
    }
    
    //Check if message has been entered
if (!$_POST['inputMessage']) {
      $errMessage = '<div class="error"> Sorry, your message is rquired</div>';
    }

/* Let's prepare the message for the e-mail */

$subject = "Humanitas-london received a message.";

$message = "

Name: $name
Email: $email

Message:
$message

";
if (!$errName  && !$errEmail && !$errMessage) {
/* Send the message using mail() function */
mail($myemail, $subject, $message, $headers);
}
/* Redirect visitor to the thank you page */
header('Location: http://humanitas-london.com/contact.html');
exit();

?>