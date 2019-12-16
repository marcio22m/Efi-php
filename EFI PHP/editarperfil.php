<?php

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}

include 'menu.php'; // Coloco el nav en la pag

// traigo el id del usuario mediante sesion
$id = $_SESSION ['idusuario']; 
// Traigo la publicacion con la consulta y la ejecuto
$query ="SELECT * FROM users WHERE id = '$id'"; 
$resultado = mysqli_query($mysqli,$query);
$row = mysqli_fetch_array($resultado);
?>

<form class="form3" action="datoseditarperfil.php" method="post">
    <h2 class="h22">Editar Perfil</h2>
    <input name="id" type="hidden" value="<?php echo $row[0]; ?>">
    <p type="Nombre(*) :"><input name="nombre" value="<?php echo $row[1]; ?>" required></input></p>
    <p type="Apellido :"><input name="apellido"  value="<?php echo $row[2]; ?>"></input></p>
    <p type="Email(*) :"><input name="email" value="<?php echo $row[4]; ?>" required></input></p>
    <p type="Avatar :"><input name="avatar" value="<?php echo $row[6]; ?>"></input></p>
    <button class="button" type="sudmit" style="text-align: center;">Guardar</button><br><br>
    <p> (*) = Campo obligatorio </p>
</form>

<?php
include 'final.php'; // Coloco el footer en la pag
?>