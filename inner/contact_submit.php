<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  // Build email message
  $to = 'your_email@example.com'; // Replace with your email address
  $subject = 'New Contact Form Submission';
  $message_body = "Name: $name\n";
  $message_body .= "Email: $email\n";
  $message_body .= "Phone: $phone\n";
  $message_body .= "Message:\n$message\n";

  // Send email
  $headers = "From: $name <$email>";

  if (mail($to, $subject, $message_body, $headers)) {
    // Email sent successfully
    echo "Thank you for contacting us. We will get back to you shortly.";
  } else {
    // Error sending email
    echo "Sorry, there was an error submitting your form. Please try again later.";
  }
}
?>
