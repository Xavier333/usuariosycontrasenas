<?php //Ejemplo aprenderaprogramar.com, archivo escribir.php

#if($_POST){
    session_start();

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $consulta = $_POST['consulta'];
    $usuarioadm = $_SESSION['usuario'];
    #$usuario = $_POST['usuario'];
    #$codigoContra = $_POST['codigo'];
    #nombre de la imagen

    /*
    $imagen = $_FILES['archivo']['name'];
    #tenemos que guardar la imagen en una carpeta 
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
    $fecha = new DateTime();
    $imagen= $fecha->getTimestamp()."_".$imagen;
    move_uploaded_file($imagen_temporal,"imagenes/".$imagen);
    */

    #https://github.com/PHPMailer/PHPMailer

# si utilizamos gmail, conviene realizarse una cuenta nueva y darle acceso desde esa cuenta 
#de google a aplicaciones poco seguras "SI".

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'php_mailer/Exception.php';
    require 'php_mailer/PHPMailer.php';
    require 'php_mailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2; #0 #SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP protocolo de envio 
        $mail->Host       = 'smtp.gmail.com';        # el host de gmail,              //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'usuarios.codigos.contrasenas@gmail.com';                     //SMTP username
        $mail->Password   = 'usuariocontrasena';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;#'tls';           //Enable implicit TLS encryption
        $mail->Port       = 465; #587; #                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
    # $mail->setFrom('giselemailerphp@gmail.com', 'Giselita');
    #prueba!
        $mail->setFrom('usuarios.codigos.contrasenas@gmai.com', 'Usuarios y Contrasenas');
    # $mail->addAddress('giselemgonzalez@gmail.com', 'Gise');     //Add a recipient
        $mail->addAddress($email);               //Name is optional
        $mail->addAddress('javy.g.campos@hotmail.com');
        #$mail->addReplyTo('info@example.com', 'Information');
    # $mail->addCC('cc@example.com');
        #$mail->addBCC('bcc@example.com');

        //Attachments
    # $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    # $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML PARA ACEPTAR HTML ENVIO
        $mail->Subject = "Usuario: $usuarioadm"; //'Hola! Esto es una ayuda dsd php.';
        $mail->Body    = "<p>Nombre: $nombre <br> Consulta: $consulta</p>";
    # $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'El mail se envio correctamente!';
    } catch (Exception $e) {
        echo "El mail no fue enviado. Mailer Error: {$mail->ErrorInfo}";
    }

        #creo una instancia(objeto) de la clase de conexion
        /*
        $conexion = new conexion();
        $sql="INSERT INTO `proyectos` (`id`, `nombre`, `descripcion`, `direccionWeb`, `usuario`, `codigoContra`)  VALUES (NULL, '$nombre_proyecto', '$descripcion', '$direccionWeb', '$usuario', '$codigoContra')";
        
        
        $id_proyecto = $conexion->ejecutar($sql);
        */
        #para que no inserte muchas veces
        header("location:listado.php");
  #  }

?>