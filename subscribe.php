<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    // Your email address where you want to receive the submissions
    $to = "sub@10gerine.com";
    
    // Subject of the email
    $subject = "New subscription";
    
    // Email content
    $message = "A new user subscribed to your newsletter.\nEmail: " . $email;
    
    // Headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for subscribing!";
    } else {
        echo "Oops! Something went wrong.";
    }
}
?>
