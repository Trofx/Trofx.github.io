<?php
// Include the PHPMailer library
require 'path_to_phpmailer/PHPMailerAutoload.php';

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and perform basic validation
    $name = trim($_POST["nimi"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["sõnum"]);

    if (empty($name) || empty($email) || empty($message)) {
        // Handle form fields that are required but empty
        echo "Please fill in all required fields.";
        exit;
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer;
    
    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_username@example.com';
    $mail->Password = 'your_smtp_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set sender and recipient addresses
    $mail->setFrom($email, $name);
    $mail->addAddress('malmjaanus@gmail.com', 'Recipient Name');

    // Set email subject and message
    $subject = "New Inquiry from $name";
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    if (!$mail->send()) {
        // Handle email sending errors
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        // Email sent successfully
        header("Location: thank_you_page.html");
    }
} else {
    // Redirect users who access this script directly
    header("Location: index.html");
}
?>
