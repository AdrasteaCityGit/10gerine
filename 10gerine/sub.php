<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize email input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set sender and recipient email addresses
        $from = "sub@10gerine.com";
        $to = "10gerine@phaedrix.us";

        // Email subject and message
        $subject = "New Subscription";
        $message = "New subscription: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

        // Additional headers to prevent email header injection
        $headers = array(
            'From' => $from,
            'Reply-To' => $from,
            'MIME-Version' => '1.0',
            'Content-Type' => 'text/plain; charset=UTF-8'
        );

        // Convert headers array to string
        $headers_str = '';
        foreach ($headers as $key => $value) {
            $headers_str .= "$key: $value\r\n";
        }

        // Attempt to send the email
        if (mail($to, $subject, $message, $headers_str)) {
            echo "Subscription successful!";
        } else {
            echo "Failed to send subscription email. Please try again later.";
            // Add error logging
            error_log("Failed to send email: $to, $subject");
        }
    } else {
        echo "Invalid email address!";
    }
}
?>
