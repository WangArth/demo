<?php
   if(isset($_POST['select']) && !empty($_POST['select']) &&
   isset($_POST['Nombre']) && !empty($_POST['Nombre']) &&
   isset($_POST['Correo']) && !empty($_POST['Correo']) &&
   isset($_POST['Fecha']) && !empty($_POST['Fecha']) &&
   isset($_POST['Recoger']) && !empty($_POST['Recoger']) &&
   isset($_POST['Detalles']) && !empty($_POST['Detalles'])){
           require 'phpmailer/PHPMailerAutoload.php';
           $mail = new PHPMailer;
           $mail->isSMTP();
           $mail->Host='smtp.gmail.com';
           $mail->Port=587;
           $mail->SMTPAuth=true;
           $mail->SMTPSecure='tls';
           $mail->Username='cesar.dsw20@gmail.com';
           $mail->Password='DswSystem20!';
           $select = $_POST['select'];
           $client_name = $_POST['Nombre'];
           $client_mail = $_POST['Correo'];
           $fecha = $_POST['Fecha'];
           $Recoger = $_POST['Recoger'];
           $Detalles = $_POST['Detalles'];
           $client_mesage = "[ Servicio: ".$select." ]";
           $client_mesage .= " [ Fecha: ".$fecha." ]";
           $client_mesage .= " [ Recoger: ".$Recoger." ]";
           $client_mesage .= " [ Detalles: ".$Detalles." ]";
           $mail_to="administracion@ferregya.com";
           $subject="Haz tu pedido";
           $email = $client_mesage;
           $mail->setFrom($client_mail,$client_name);
           $mail->addAddress($mail_to);
           $mail->addReplyTo($client_mail,$client_name);
           $mail->isHTML(true);
           $mail->Subject= $subject;
           $mail->Body='<div style="width: 90%;margin:auto;">'.' <h1 style="text-align: center;background-color: #000000;color:white"> FERREGYA </h1>'.' <h2> Nombre: '.$client_name.'</h2>'.'<hr style="background-color: #30475e; height: 0.1vw;"><h2>Mensaje: </h2>'.$email.'<br><br><hr style="background-color: #000000; height: 1vw;"></div>';
           if ($mail->send()) {
                   header('Location:../index.html');
           }else{
                echo " Error to Send";
           }
   }else {
           echo "Auth Error";
   }