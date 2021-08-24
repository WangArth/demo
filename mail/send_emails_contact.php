<?php
if(isset($_POST['name']) && !empty($_POST['name']) &&
isset($_POST['email']) && !empty($_POST['email']) &&
isset($_POST['subject']) && !empty($_POST['subject']) &&
isset($_POST['message']) && !empty($_POST['message']) ){
        require 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='cesar.dsw20@gmail.com';
        $mail->Password='DswSystem20!';
        $client_name = $_POST['name'];
        $client_mail = $_POST['email'];
        $client_mesage = $_POST['message'];
        $mail_to="administracion@ferregya.com";
        $subject= $_POST['subject'];
        $email = $client_mesage;
        $mail->setFrom($client_mail,$client_name);
        $mail->addAddress($mail_to);
        $mail->addReplyTo($client_mail,$client_name);
        $mail->isHTML(true);
        $mail->Subject= $subject;
        $mail->Body='<div style="width: 90%;margin:auto;">'.' <h1 style="text-align: center;background-color: #000000;color:white"> FERREGYA </h1>'.' <h2> Nombre: '.$client_name.'<br> Email: '.$client_mail .'</h2>'.'<hr style="background-color: #30475e; height: 0.1vw;"><h2>Mensaje: </h2>'.$email.'<br><br><hr style="background-color: #000000; height: 1vw;"></div>';
        if ($mail->send()) {
                header('Location:../index.html');
        }else{
             echo " Error to Send";
        }
}else {
        echo "Auth Error";
}