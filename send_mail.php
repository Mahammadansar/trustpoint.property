<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    // Handle file upload
    if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] == 0) {
        $resume = $_FILES['userfile'];
        $resume_tmp = $resume['tmp_name'];
        $resume_name = $resume['name'];
    } else {
        echo 'File upload error.';
        exit;
    }

    // PHPMailer setup
    $mail = new PHPMailer(true);
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mahammadansar02@gmail.com'; // Replace with your Gmail
        $mail->Password   = 'ecti juhg mrgl xsiq';    // Use App Password, not Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email settings
        $mail->setFrom('mahammadansar02@gmail.com', 'Job Application Form'); // From address
        $mail->addAddress('mahammadansar02@gmail.com'); // To address (your Gmail)

        $mail->Subject = 'New Job Application from ' . $name;
        $mail->Body    = "
            <h2>New Job Application</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Cover Letter:</strong><br>{$message}</p>
        ";
        $mail->isHTML(true);

        // Attach resume
        $mail->addAttachment($resume_tmp, $resume_name);

        if ($mail->send()) {
            echo 'Application sent successfully!';
        } else {
            echo 'Failed to send email.';
        }
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
