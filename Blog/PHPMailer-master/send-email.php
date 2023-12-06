<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function sendMail($title, $content, $addressmail)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->CharSet = 'utf-8';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nganhtppc06095@fpt.edu.vn';
            $mail->Password = 'jbja kcny hpqb detm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('nganhtppc06095@fpt.edu.vn', 'Phương Ngân');
            $mail->addAddress($addressmail);

            $mail->isHTML(true);
            $mail->Subject = $title; // Use the $title variable
            $mail->Body    = $content; // Use the $content variable

            if($mail->send()) {
                echo "<script>var success = true;</script>";
            } else {
                echo "<script>var success = false;</script>";
            }

        } catch (Exception $e) {
            echo "Không thể gửi tin nhắn. Lỗi gửi thư: {$mail->ErrorInfo}";
        }
    }
}

$mailer = new Mailer();
$mailer->sendMail($subject, $message, $email);
