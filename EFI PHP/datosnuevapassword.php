<?php

session_start(); // indico que voy a trabajar con sesion

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}

$idusuario= $_SESSION['idusuario'];
$password = $_POST['password']; // Almaceno en $password la nueva contraseña
$password = md5($password); // Encripto contraseña

// Consulta y ejecuto
$query="UPDATE users SET password='$password' WHERE id='$idusuario'";
$mysqli->query($query);

echo '<script language="javascript">alert("Contraseña actualizada");window.location.href="cerrarsesion.php"</script>'; 

?>