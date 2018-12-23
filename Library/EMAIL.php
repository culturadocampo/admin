<?php

include 'Library/PHPMailer/PHPMailer.php';
include 'Library/PHPMailer/SMTP.php';
include 'Library/PHPMailer/Exception.php';

class EMAIL {

    static function send_mail($destino, $assunto, $corpo) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        try {
//            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = MAIL_SMPT;
            $mail->SMTPAuth = true;
            $mail->Username = MAIL_USERNAME;
            $mail->Password = MAIL_PASSWORD;
            $mail->SMTPSecure = MAIL_PROTOCOL;
            $mail->Port = MAIL_PORT;
            $mail->setFrom(MAIL_USERNAME, PROJECT_NAME);
            $mail->addAddress($destino);
            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $mail->Body = $corpo;
            $mail->send();
            return true;
        } catch (Exception $e) {
//            echo $mail->ErrorInfo;
            return false;
        }
    }

}
