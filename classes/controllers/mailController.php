<?php
    namespace controllers;

    class mailController{
        public static function email($user_id, $name, $email, $message, $date){
            $insertMail = \MySql::connect()->prepare("INSERT INTO `notification` VALUES (null,?,?)");
            $insertMail->execute(array($user_id,$message));

            @$file = '<html> <p>'.$message.'</p> </html>';
            
            @$email_send = "raiane.dev@gmail.com";
            @$email_destiny = $email;
            @$subject = "Aviso!";

            @$headers = 'MIME-Version: 1.0'."\r\n";
            @$headers .= 'Content-type: text/html; charset=iso-8859'."\r\n";
            @$headers .= 'From: '.$name.' <$email>';

            ini_set('sendmail_from','raissa.fullstack@gmail.com');
            ini_set("SMTP","smtp.gmail.com");
            ini_set("smtp_port","587");
            ini_set('auth_user', 'raissa.fullstack@gmail.com');
            ini_set('auth_password', '*****');

            @$send = mail($email_destiny, $subject, $file, $headers);
            if(@$send){
                echo "<meta http-equiv='refresh' content='10;'>";
            }
        }
        
    }
?>