<?php

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}

$email = $_POST['email']; // Almaceno en $email el mail
$password = $_POST['password']; // Almaceno en $password la contaseña
$password = md5($password); // encripto contraseña

// Busco los datos ingresados en la base de adtos

$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password';"; 
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

// Si los datos son correctos entra al if y crea la sesion
if($row){
    // Creo la sesion, con los datos de usuario, mail y el id
    session_start();
    $_SESSION['nombre']= $row['firstname']; 
    $_SESSION['email']= $row['email'];
    $_SESSION['idusuario']= $row['id'];
    header('Location: index.php');
// Si los datos son incorrectos entra al else, notifica e reubica al usuario a ingresar nuevos datos
}else{
    echo '<script language="javascript">alert("Datos Incorrectos");window.location.href="login.php"</script>'; 
}

?>

