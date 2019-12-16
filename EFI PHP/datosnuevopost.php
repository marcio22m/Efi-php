<?php

session_start(); // indico que voy a trabajr con sesion

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}

$titulo = $_POST['titulo']; // Almaceno en $nombre el nombre
$descripcion = $_POST['descripcion']; // Almaceno en $descripcion la descripcion del post
$imagen = $_POST['imagen']; // Almaceno en $imagen el link de la imagen que era opcional
$categoria = $_POST['categoria']; // Almaceno en $categoria el id de la categoria
$idusuario = $_SESSION['idusuario']; // Almaceno en $idusuario el id del usuario atraves de la sesion

// Almaceno los datos traidos en la tabla publicaciones
$query = "INSERT INTO publicaciones (titulo,descripcion,image,user_id,categoria_id) VALUES ('$titulo','$descripcion','$imagen','$idusuario','$categoria')";
$mysqli->query($query);

echo '<script language="javascript">alert("Post Agregado Exitosamente");window.location.href="index.php"</script>'; 
// Post almacenado. Aviso y reubico en index

?>