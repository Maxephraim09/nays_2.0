<?php
namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    protected $mail;
    protected $error;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->setup();
    }

    protected function setup()
    {
        try {
            // Server settings
            $this->mail->SMTPDebug = $_ENV['APP_DEBUG'] === 'true' ? SMTP::DEBUG_SERVER : SMTP::DEBUG_OFF;
            $this->mail->isSMTP();
            $this->mail->Host = $_ENV['MAIL_HOST'];
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $_ENV['MAIL_USERNAME'];
            $this->mail->Password = $_ENV['MAIL_PASSWORD'];
            $this->mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
            $this->mail->Port = $_ENV['MAIL_PORT'];
            
            // Default sender
            $this->mail->setFrom($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
        } catch (Exception $e) {
            $this->error = $e->getMessage();
        }
    }

    public function send($to, $subject, $body, $altBody = '')
    {
        try {
            // Recipients
            if (is_array($to)) {
                foreach ($to as $email) {
                    $this->mail->addAddress($email);
                }
            } else {
                $this->mail->addAddress($to);
            }

            // Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->AltBody = $altBody ?: strip_tags($body);

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            $this->error = $this->mail->ErrorInfo;
            return false;
        }
    }

    public function sendTemplate($to, $subject, $template, $data = [])
    {
        $view = new View();
        $view->layout = null;
        ob_start();
        $view->render($template, $data);
        $body = ob_get_clean();
        
        return $this->send($to, $subject, $body);
    }

    public function getError()
    {
        return $this->error;
    }
}