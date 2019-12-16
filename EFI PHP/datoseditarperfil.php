<?php

session_start(); // indico que voy a trabajar con sesion

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}
$id = $_POST['id']; // Almaceno en $id el id del usuario
$nombre = $_POST['nombre']; // Almaceno en $nombre el nombre
$apellido = $_POST['apellido']; // Almaceno en $apellido el apellido
$email = $_POST['email']; // Almaceno en $email el nuevo mail de la cuenta
$avatar = $_POST['avatar']; // Almaceno en $avatar el link de la imagen de su perfil

// Preparo la consulta y la ejecuto
$query="UPDATE users SET firstname='$nombre', lastname='$apellido', email='$email',avatar='$avatar' WHERE id='$id'";
$mysqli->query($query);

echo '<script language="javascript">alert("Perfil Editado Correctamente");window.location.href="editarperfil.php"</script>'; 
/* 
    Perfil editado correctamente y reubicado en editarperfil.php
    para poder observar los cambios ya aplicados 
*/

?>