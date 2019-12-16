<?php

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}

include 'menu.php'; // Coloco el nav en la pag

?>

<form class="form3" action="datosnuevopost.php" method="post">
    <h2 class="h22">Crear nuevo post</h2>
    <p type="Titulo(*) :"><input name="titulo" required></input></p>
    <p type="Descripcion(*) :"><input name="descripcion" required></input></p>
    <p type="Imagen :"><input name="imagen"></input></p>
    <p type="Categoria :">
        <select name="categoria"> 
            <?php   
            // Selecciono todo lo que hay en la tabla categoria
            $query ="SELECT * FROM categorias"; 
            $result = $mysqli->query($query);
            // Y por cada resultado, voy creando una opcion para que el usuario elija
            while($row = $result->fetch_array()){ ?> 
                <option value="<?php echo $row['id'] ?>" ><?php echo $row['nombre'] ?></option>  
            <?php } 
            // La opcion que el usuario elija, se va a pasar el id de la categoria
            ?>
        </select>
    </p>
    <button class="button" type="sudmit" style="text-align: center;">Crear</button><br><br>
    <p> (*) = Campo obligatorio </p>
</form>

<?php
include 'final.php'; // Coloco el footer en la pag
?>