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

$nombre = $_POST['nombre']; // Almaceno en $nombre el nombre
$apellido = $_POST['apellido']; // Almaceno en $apellido el apellido
$email = $_POST['email']; // Almaceno en $email el mail
$password = $_POST['password']; // Almaceno en $password la contraseña
$avatar = $_POST['avatar']; // Almaceno en $avatar el linkl de la imagen de la cuenta
$passwordencriptada = md5($password); // Encripto contraseña

// Busco si ya hay un usuario con el mismo mail
$query = "SELECT * FROM users WHERE email = '$email';"; 
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

// Si ya hay uno, aviso y reubico de nuevo para que ingrese nuevos datos
if($row){
    echo '<script language="javascript">alert("Email ya en uso");window.location.href="singup.php"</script>';
// Si no lo hay, registro la nueva cuenta del usuario,mando los datos y reubico en el inicio 
} else {
    
    $sql = "INSERT INTO users (firstname,lastname,email,password,avatar) VALUES ('$nombre','$apellido','$email','$passwordencriptada','$avatar')";
    $mysqli->query($sql);
    // Cuenta ya creada

    // Mandar los datos al mail
    $mail = new PHPMailer(true);
    try {
    //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                  
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = '';// Completar con datos personales. Mail                
        $mail->Password   = '';// Completar con datos personales. password                                            
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;                                   

        //Recipients
        $mail->setFrom('');// Completar con datos personales. Mail                
        $mail->addAddress($email, 'Cuenta');   

        // Content
        $mail->isHTML(true);                             
        $mail->Subject = 'Cuenta Post';
        $mail->Body    = "Bienvenido $nombre $apellido, Cuenta creada exitosamente
                        Email para el ingreso: $email 
                        Contraseña : $password"; 

        $mail->send();
        echo 'Mensaje enviado con exito';
    } catch (Exception $e) {
        echo "Mensaje no enviado. Error: {$mail->ErrorInfo}";
    }


    echo '<script language="javascript">alert("Usuario registrado correctamente");window.location.href="index.php"</script>'; 
}

?>