<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}

$email = $_POST['email']; // Almaceno en $email el mail

// Busco los datos ingresados en la base de adtos
$query = "SELECT * FROM users WHERE email = '$email';"; 
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

// Verifico si el mail ingresado esta registrado
if ($row){
    // GENERADOR DE CONTRASEñAS SACADA DE INTERNET

    //Carácteres para la contraseña
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "";
    //Genero una contraseña de 8 caracteres
    for($i=0;$i<8;$i++) {
    //obtenemos un caracter aleatorio escogido de la cadena de caracteres
    $password .= substr($str,rand(0,62),1);
    }

    // FIN DE GENERADOR DE CONTRASEñAS    
    $passwordencriptada = md5($password); // Encripto contraseña
    // encripto la password y la actualizo en la base de datos ejecutando la consulta
    $query2="UPDATE users SET password='$passwordencriptada' WHERE email='$email'";
    $mysqli->query($query2);

// Si el mail no esta registrado, aviso y reubico
} else {
    echo '<script language="javascript">alert("Email no registrado");window.location.href="recuperarpassword.php"</script>'; 
}

include 'menu.php'; // Coloco el nav en la pag

// Bloque entero traido de phpmailer
if($row){
    $mail = new PHPMailer(true);
    try {
    //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                  
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = ''; // Completar con datos personales. Mail                
        $mail->Password   = ''; // Completar con datos personales. password                                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;                                   

        //Recipients
        $mail->setFrom(''); // Completar con datos personales. Mail                
        $mail->addAddress($email, 'Contraseña');   

        // Content
        $mail->isHTML(true);                             
        $mail->Subject = 'Contraseña';
        $mail->Body    = "NUEVA CONTRASEñA
                        Email : $email 
                        Contraseña : $password"; 

        $mail->send();
        echo '<script language="javascript">alert("Mensaje enviado con exito");window.location.href="index.php"</script>'; 
    } catch (Exception $e) {
        echo '<script language="javascript">alert("Mensaje no enviado");window.location.href="index.php"</script>'; 
    }
}

include 'final.php'; // Coloco el footer en la pag
?>