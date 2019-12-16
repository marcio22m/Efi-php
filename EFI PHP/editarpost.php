<?php

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}

include 'menu.php'; // Coloco el nav en la pag

// traigo mediante get el id de la publicacion
$idpublicacion = $_GET['id']; // Almaceno en $idpublicacion el id
// Traigo la publicacion con la consulta y la ejecuto
$query ="SELECT * FROM publicaciones WHERE id = '$idpublicacion'"; 
$resultado = mysqli_query($mysqli,$query);
$row = mysqli_fetch_array($resultado);
?>

<form class="form3" action="datoseditarpost.php" method="post">
    <h2 class="h22">Editar post</h2>
    <input name="id" type="hidden" value="<?php echo $row[0]; ?>">
    <p type="Titulo(*) :"><input name="titulo" value="<?php echo $row[1]; ?>" required></input></p>
    <p type="Descripcion(*) :"><input name="descripcion"  value="<?php echo $row[2]; ?>"required></input></p>
    <p type="Imagen :"><input name="imagen" value="<?php echo $row[3]; ?>"></input></p>
    <p type="Categoria :">
        <select name="categoria"> 
            <?php   
            // Selecciono todo lo que hay en la tabla categoria
            $query2 ="SELECT * FROM categorias"; 
            $resultado2 = $mysqli->query($query2);
            // Y por cada resultado, voy creando una opcion para que el usuario elija
            while($row2 = $resultado2->fetch_array()){ ?> 
                <option value="<?php echo $row2['id'] ?>" ><?php echo $row2['nombre'] ?></option>  
            <?php } 
            // La opcion que el usuario elija, se va a pasar el id de la categoria
            ?>
        </select>
    </p>
    <button class="button" type="sudmit" style="text-align: center;">Guardar</button><br><br>
    <p> (*) = Campo obligatorio </p>
</form>

<?php
include 'final.php'; // Coloco el footer en la pag
?>