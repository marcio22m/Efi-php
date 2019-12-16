<?php

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}

// traigo mediante get el id de la publicacion
$idpublicacion = $_GET['id']; // Almaceno en $idpublicacion el id

// Hago la consulta y la ejecuto
$query="DELETE FROM publicaciones WHERE id='$idpublicacion'";
mysqli_query($mysqli,$query);

/*
    Reubico de nuevo a los post del usuario para visualizar
    que ya no se encuentra el post eliminado
*/
header('Location: mispost.php'); 

?>