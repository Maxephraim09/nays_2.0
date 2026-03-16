<?php
namespace App\Libraries;

// Use the correct namespace for PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    private $mail;
    
    public function __construct() {
        // Check if PHPMailer class exists
        if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            die('PHPMailer not found. Please run: composer require phpmailer/phpmailer');
        }
        
        $this->mail = new PHPMailer(true);
        
        // Server settings
        $this->mail->isSMTP();
        $this->mail->Host       = MAIL_HOST;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = MAIL_USERNAME;
        $this->mail->Password   = MAIL_PASSWORD;
        $this->mail->SMTPSecure = MAIL_ENCRYPTION;
        $this->mail->Port       = MAIL_PORT;
        
        // Recipients
        $this->mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
        
        // Content
        $this->mail->isHTML(true);
        $this->mail->CharSet = 'UTF-8';
    }
    
    public function send($to, $subject, $body, $altBody = '') {
        try {
            $this->mail->addAddress($to);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = $altBody ?: strip_tags($body);
            
            return $this->mail->send();
        } catch (Exception $e) {
            error_log("Mailer Error: " . $this->mail->ErrorInfo);
            return false;
        }
    }
    
    public function sendVerificationEmail($email, $name, $token) {
        $subject = "Verify Your Email - " . APP_NAME;
        $link = APP_URL . "/verify-email?token=" . $token;
        $body = "<h2>Welcome!</h2><p>Click <a href='$link'>here</a> to verify your email.</p>";
        
        return $this->send($email, $subject, $body);
    }
    
    public function sendPasswordResetEmail($email, $name, $token) {
        $subject = "Reset Password - " . APP_NAME;
        $link = APP_URL . "/reset-password?token=" . $token;
        $body = "<h2>Password Reset</h2><p>Click <a href='$link'>here</a> to reset your password.</p>";
        
        return $this->send($email, $subject, $body);
    }
}