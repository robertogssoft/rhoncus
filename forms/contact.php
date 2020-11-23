<?php
  
  if(empty($_POST['name']) || 
      empty($_POST['email']) || 
      empty($_POST['subject']) || 
      empty($_POST['message']) || 
      !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo "Faltan datos";
    return false;
  }

  
  $name = strip_tags(htmlspecialchars($_POST['name']));
  $email = strip_tags(htmlspecialchars($_POST['email']));
  $subject = strip_tags(htmlspecialchars($_POST['subject']));
  $message = strip_tags(htmlspecialchars($_POST['message']));

  $header = 'From: ' .$email . "\r\n";
  $header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
  $header .= "Mime-Version: 1.0 \r\n";
  $header .= "Content-Type: text/plain";
  $header .= "Enviado desde la pagina de Grupo Rhoncus";

  $mensajeCompleto = "Este mensaje fue enviado por " . $name . ",\r\n";
  $mensajeCompleto .= "Su e-mail es: " . $email . "\r\n";
  $mensajeCompleto .= "Mensaje: " . $message . "\r\n";
  $mensajeCompleto .= "Enviado el " .date('d/m/Y', time());
  

  $destinatario = 'jofreroda@gmail.com';

  mail($destinatario, utf8_decode($subject), utf8_decode($mensajeCompleto), $header);

  echo 'Tu mensaje ha sido enviado. ¡Gracias!';


  
?>
