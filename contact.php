<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs (matching your form fields)
    $name    = $_POST['c_name'];
    $email   = $_POST['c_email'];
    $phone   = $_POST['c_phone1111'];
    $message = $_POST['c_message'];

    // PHPMailer setup
    $mail = new PHPMailer(true);
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mahammadansar02@gmail.com'; // Your Gmail
        $mail->Password   = 'ecti juhg mrgl xsiq';        // App Password (not Gmail password)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email settings
        $mail->setFrom('mahammadansar02@gmail.com', 'Website Contact Form');
        $mail->addAddress('mahammadansar02@gmail.com'); // Your email

        $mail->Subject = 'New Inquiry from ' . $name;
        $mail->isHTML(true);
        $mail->Body    = "
            <h2>New Inquiry Received</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        if ($mail->send()) {
            echo 'Your message has been sent successfully!';
        } else {
            echo 'Failed to send email.';
        }
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
