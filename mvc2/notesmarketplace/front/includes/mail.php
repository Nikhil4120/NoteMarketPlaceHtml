
<?php
    require './../phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->port = 587;
    $mail->SMTPAUTH=true;
    $mail->SMTPSecure='tls';
    $mail->SMTPAuth=true;
    $mail->Username='notesmarketplace4120@gmail.com';
    $mail->Password='nikhil1234';  
?>