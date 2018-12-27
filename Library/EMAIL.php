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
            $mail->Host = CONFIG::$MAIL_SMPT;
            $mail->SMTPAuth = true;
            $mail->Username = CONFIG::$MAIL_USERNAME;
            $mail->Password = CONFIG::$MAIL_PASSWORD;
            $mail->SMTPSecure = CONFIG::$MAIL_PROTOCOL;
            $mail->Port = CONFIG::$MAIL_PORT;
            $mail->setFrom(CONFIG::$MAIL_USERNAME, CONFIG::$PROJECT_NAME);
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
