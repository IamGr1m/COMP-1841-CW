<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if (isset($_POST["send"])) {

  $mail = new PHPMailer(true);


    $mail->isSMTP();                        
    $mail->Host       = 'smtp.gmail.com';    
    $mail->SMTPAuth   = true;          
    $mail->Username   = 'hoangquan230505provjp@gmail.com';   
    $mail->Password   = 'szublouqknozkwee';      
    $mail->SMTPSecure = 'ssl';           
    $mail->Port       = 465;                                    

    
    $mail->setFrom( $_POST["email"], $_POST["name"]); 
    $mail->addAddress('hoangquan230505provjp@gmail.com');     
    $mail->addReplyTo($_POST["email"], $_POST["name"]);

    
    $mail->isHTML(true);               
    $mail->Subject = $_POST["subject"];   
    $mail->Body    = $_POST["message"]; 

    $mail->send();
    echo
    " 
    <script> 
     alert('Message was sent successfully!');
     document.location.href = 'index.php';
    </script>
    ";
}else {
        ob_start();
        include '../templates/mail.html.php';
        $output = ob_get_clean();
        $title = 'Send mail to admin';
}
include '../templates/layout.html.php';
?>