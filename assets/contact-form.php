<?php

// Define your recipient email address
$recipientEmail = "tamizharasane150@gmail.com";

// Check if the form is submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data (sanitize and validate if needed)
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  // Prepare email content
  $subject = "Contact Form Submission - " . $name;
  $body = "You have received a new contact form submission.\n\n"
        . "Name: " . $name . "\n"
        . "Email: " . $email . "\n"
        . "Phone: " . $phone . "\n\n"
        . "Message:\n" . $message;

  // Send email notification using PHP mail function
  $headers = "From: " . $email . "\r\n";
  $headers .= "Reply-To: " . $email . "\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  if (mail($recipientEmail, $subject, $body, $headers)) {
    // Email sent successfully
    $message = "Thank you for contacting us! Your message has been sent successfully.";
  } else {
    // Email sending failed
    $message = "There was an error sending your message. Please try again later.";
  }
} else {
  // Not a POST request (form not submitted)
  $message = "";
}

?>
