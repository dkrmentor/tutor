<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['procedure'])) {
        // Retrieve form data
        $procedure = $_POST['procedure'];
        $surnameName = $_POST['surnameName'];
        $daysNo = $_POST['daysNo'];
        $birthYear = $_POST['birthYear'];
        $place = $_POST['place'];
        $guardian = $_POST['guardian'];
        $employment = $_POST['employment'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $liveWithMinor = $_POST['liveWithMinor'];
        $nonRegTamideRight = $_POST['nonRegTamideRight'];

        // Build email message
        $to = 'your_email@example.com'; // Replace with your email address
        $subject = 'New Form Submission';
        $message_body = "Procedure: $procedure\n";
        $message_body .= "Surnames and Names: $surnameName\n";
        $message_body .= "DAYS NO: $daysNo\n";
        $message_body .= "Year of Birth: $birthYear\n";
        $message_body .= "Place: $place\n";
        $message_body .= "Guardian: $guardian\n";
        $message_body .= "Employment: $employment\n";
        $message_body .= "Phone Number: $phoneNumber\n";
        $message_body .= "Email: $email\n";
        $message_body .= "Live with Minor: $liveWithMinor\n";
        $message_body .= "Non-Reg TAMIDE Right: $nonRegTamideRight\n";

        // Send email
        $headers = "From: $email";

        if (mail($to, $subject, $message_body, $headers)) {
            // Email sent successfully
            echo "Thank you for submitting the form! Form data has been sent to the provided email address.";
        } else {
            // Error sending email
            echo "Sorry, there was an error submitting your form. Please try again later.";
        }
    } else {
        echo "Error: Please fill out all required fields.";
    }
}
?>
