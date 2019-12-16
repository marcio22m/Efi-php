<?php

// Conectando a la base de datos
$mysqli = new mysqli('localhost', 'root', 'password', 'itec_test_2019-11-18');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else {
    echo "";
}

include 'menu.php'; // Coloco el nav en la pag

// traigo mediante get el id del usuario
$idusuario = $_GET['id']; // Almaceno en $idusuario el id
// Traigo todas las publicaciones de ese usuario con la consulta y la ejecuto
$query ="SELECT * FROM publicaciones WHERE user_id = '$idusuario' ORDER BY creado DESC"; 
$resultado = mysqli_query($mysqli,$query);

// Traigo todas las publicaciones de ese usuario con la consulta y la ejecuto
$query2 ="SELECT * FROM users WHERE id = '$idusuario'"; 
$resultado2 = mysqli_query($mysqli,$query2);
$row2 = $resultado2->fetch_assoc();
?>

<!--
    La siguiente seccion es el menu donde el usuario
    puede elegir ver solo la categoria que desea
-->
<div class="categoria2">
    <h1>  Publicaciones de <?php echo $row2['firstname'] . " " . $row2['lastname'] ?></h1>
</div>

<!-- Franja divisora -->
<div style="height: 30px; width: 100%;background-color:#343a40;"></div><br><br> 

<!-- Publicaciones -->
<div class="container">
    <?php
    // Mediante el while, voy a mostrar por pantalla todos los post traidos del usuario
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
                        $query2 = "SELECT * FROM categorias WHERE id = '$idcategoria';"; 
                        $resultado2 = mysqli_query($mysqli,$query2);
                        $categoria = mysqli_fetch_array($resultado2);
                        ?>
                        <!-- CATEGORIA A LA QUE PERTENECE EL POST -->
                        <span><i class="glyphicon glyphicon-comment"></i> Categoria : <?php echo $categoria[1] ?></span>      
                    </ul>
                </div>
            </div>       
        </div>

    <?php } ?>
</div>

<?php
include 'final.php'; // Coloco el footer en la pag
?>

