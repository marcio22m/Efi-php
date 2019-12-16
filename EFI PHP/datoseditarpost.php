<?php

session_start(); // indico que voy a trabajar con sesion

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}
$id = $_POST['id']; // Almaceno en $id el id de la publicacion
$titulo = $_POST['titulo']; // Almaceno en $titulo el titulo del post
$descripcion = $_POST['descripcion']; // Almaceno en $descripcion la descripcion del post
$imagen = $_POST['imagen']; // Almaceno en $imagen el link de la imagen que era opcional
$categoria = $_POST['categoria']; // Almaceno en $categoria el id de la categoria

// Consulta y ejecuto
$query="UPDATE publicaciones SET titulo='$titulo',descripcion='$descripcion',categoria_id='$categoria',image='$imagen' WHERE id='$id'";
$mysqli->query($query);

echo '<script language="javascript">alert("Post Editado Correctamente");window.location.href="mispost.php"</script>'; 
// Post actualizado y editado. Aviso y reubico en index

?>