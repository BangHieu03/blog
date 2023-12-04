<?php
require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';

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
            $mail->Username = 'quangndpc05293@fpt.edu.vn';
            $mail->Password = 'nhuf hwbe ldhh ikua';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('quangndpc05293@fpt.edu.vn', 'Đoàn Quang');
            $mail->addAddress($addressmail);

            $mail->isHTML(true);
            $mail->Subject = $title; // Use the $title variable
            $mail->Body    = $content; // Use the $content variable
            echo "<script>var success = false;</script>";
            $mail->send();
            echo "<script>success = true;</script>";

            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Không thể gửi tin nhắn. Lỗi gửi thư: {$mail->ErrorInfo}";
        }
    }
}
