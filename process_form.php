<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nimi"];
    $email = $_POST["email"];
    $message = $_POST["sõnum"];

    // Perform validation and data processing here

    // Example: Send an email
    $to = "malmjaanus@gmail.com";
    $subject = "New Inquiry from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    mail($to, $subject, $message, $headers);

    // You can also store the data in a database

    // Redirect the user to a thank you page or show a success message
    header("Location: thank_you_page.html");
}
?>
