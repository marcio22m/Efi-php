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

<!-- Opcion para agregar un nuevo post -->
<div class="menumispost">
    <a href="cargarpost.php"><button class="button2" type="sudmit">Agregar Nuevo Post</button></a><br>
</div><br>

<!-- Franja divisora -->
<div style="height: 30px; width: 100%;background-color:#343a40;"></div><br><br> 

<!--
    Seccion donde se muestran todos los Post
    del usuario en el orden de primero el mas nuevo.
    Interfaz de blog sacada de bootstrap
-->
<div class="container">
    <?php
    $idusuario = $_SESSION['idusuario'];
    $query ="SELECT * FROM publicaciones WHERE user_id = '$idusuario' ORDER BY creado DESC"; 
    // Traigo todos los post, ya ordenados por su campo de fecha de creacion
    $resultado=mysqli_query($mysqli,$query);
    // Mediante el while, voy a mostrar por pantalla todos los post traidos
    while ($row = mysqli_fetch_array($resultado)){
    ?>
        <div class="well">
            <div class="media">
    		    <img class="media-object" style="width: 180px;height: 150px;padding-right: 20px;" src="<?php echo $row[3]; ?>">
  		        <div class="media-body">
                    <!-- TITULO DEL POST -->
                    <h3 class="media-heading"><?php echo $row[1]; ?></h3>
                    <!-- DESCRIPCION DEL POST -->
                    <p><?php echo $row[2] ?></p>
                    <br>
                    <ul class="list-inline list-unstyled">
                        <!-- FECHA DE CREACION DEL POST -->
  			            <li><span><i class="glyphicon glyphicon-calendar"></i> Creado: <?php echo $row['4']; ?></span></li>
                        <li>|</li>
                        <!-- FECHA EN EL QUE SE ACTUALIZO EL POST -->
                        <li><span><i class="glyphicon glyphicon-calendar"></i> Actualizado: <?php echo $row['5']; ?></span></li>
                        <li>|</li>
                        <?php
                        // Busco el nombre de la categoria atraves del id
                        $idcategoria= $row['categoria_id'];
                        $query3 = "SELECT * FROM categorias WHERE id = '$idcategoria';"; 
                        $resultado3 = mysqli_query($mysqli,$query3);
                        $categoria = mysqli_fetch_array($resultado3);
                        ?>
                        <!-- CATEGORIA A LA QUE PERTENECE EL POST -->
                        <span><i class="glyphicon glyphicon-comment"></i> Categoria : <?php echo $categoria[1] ?></span>      
                    </ul>
                </div>
            </div>
            <?php $idpublicacion = $row[0] ?>
            <a href="editarpost.php?id=<?php echo $idpublicacion?>"><button class="button" type="sudmit">Editar Post</button></a><br>
            <a href="datoseliminarpost.php?id=<?php echo $idpublicacion?>"><button class="button" type="sudmit">Eliminar Post</button></a><br>
        </div>
    <?php } ?>
</div>

<?php
include 'final.php'; // Coloco el footer en la pag
?>