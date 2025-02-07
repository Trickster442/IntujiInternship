<?php
declare(strict_types= 1);  
?>

<?php
function send_email(string $email, $msg, $recommendation) {
    // Mailtrap SMTP configuration
    $smtpServer = 'smtp.mailtrap.io';
    $smtpPort = 2525;  // Or use 587 for TLS
    $username = 'cc38b451c43797';
    $password = '9495154c7d8d19';

    // Sender and receiver details
    $to = $email . "@example.com";  // Replace with the recipient's email address
    $subject = "Test Email from Mailtrap";
    $message = $msg;

    foreach ($recommendation as $value) {
        $message .= $value;
    }
    
    $headers = "From: sender@example.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";  // Specify that the email is HTML

    // Open a connection to Mailtrap SMTP server
    $connection = fsockopen($smtpServer, $smtpPort);

    if ($connection) {
        // Send the SMTP HELO command to identify the client
        fwrite($connection, "HELO " . gethostname() . "\r\n");

        // Authenticate with the Mailtrap server
        fwrite($connection, "AUTH LOGIN\r\n");
        fwrite($connection, base64_encode($username) . "\r\n");
        fwrite($connection, base64_encode($password) . "\r\n");

        // Specify the sender and recipient
        fwrite($connection, "MAIL FROM:<sender@example.com>\r\n");
        fwrite($connection, "RCPT TO:<$to>\r\n");

        // Start composing the email
        fwrite($connection, "DATA\r\n");
        fwrite($connection, "Subject: $subject\r\n");
        fwrite($connection, "From: sender@example.com\r\n");
        fwrite($connection, "To: $to\r\n");
        fwrite($connection, "MIME-Version: 1.0\r\n");
        fwrite($connection, "Content-Type: text/html; charset=UTF-8\r\n");
        fwrite($connection, "\r\n$message\r\n");
        fwrite($connection, ".\r\n");  // End of the email data

        // Send the QUIT command to close the connection
        fwrite($connection, "QUIT\r\n");

        // Close the connection
        fclose($connection);

        echo "Email sent successfully!";
        
    } else {
        echo "Failed to connect to Mailtrap.";
    }
}
?>
