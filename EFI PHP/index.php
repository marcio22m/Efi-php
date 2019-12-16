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
<!--
    La siguiente seccion es el menu donde el usuario
    puede elegir ver solo la categoria que desea
-->
<div class="categoria">
    <form action="solocategoria.php" method="post">
        <h1>Categorias</h1>
        <select name="idcategoria"> 
            <?php   
            // Traigo todas las categorias
            $query ="SELECT * FROM categorias"; 
            $result = $mysqli->query($query);
            // Pongo todos los elementos sobre el opcion, asi el usuario elije
            while($row = $result->fetch_array()){ ?> 
                <option value="<?php echo $row['id'] ?>" ><?php echo $row['nombre'] ?></option>  
            <?php } 
            ?>
        </select><br>
        <button class="button2" type="sudmit">Mostrar</button>
    </form>
</div>

<!-- Franja divisora -->
<div style="height: 30px; width: 100%;background-color:#343a40;"></div><br><br> 

<!--
    Seccion donde se muestran todos los Post
    en el orden de primero el mas nuevo.
    Interfaz de blog sacada de bootstrap
-->
<div class="container">
    <?php
    $query ="SELECT * FROM publicaciones ORDER BY creado DESC"; 
    // Traigo todos los post, ya ordenados por su campo de fecha de creacion
    $resultado=mysqli_query($mysqli,$query);
    // Mediante el while, voy a mostrar por pantalla todos los post traidos
    while ($row = mysqli_fetch_array($resultado)){
    ?>
        <div class="well">
        <div class="media">
    		<img class="media-object" style="width: 180px;height: 150px;padding-right: 20px;" src="<?php echo $row['image'] ?>">
  		    <div class="media-body">
                <!-- TITULO DEL POST -->
                <h3 class="media-heading"><?php echo $row['titulo'] ?></h3>
                <?php
                // Busco el nombre y apellido del usuario atraves del id usuario
                $idusuario= $row['user_id'];
                $query2 = "SELECT * FROM users WHERE id = '$idusuario';"; 
                $resultado2 = mysqli_query($mysqli,$query2);
                $nombre = mysqli_fetch_array($resultado2);
                ?>
                <!-- NOMBRE DEL AUTOR DEL POST -->
                <?php $idusuario = $nombre[0] ?>
                <a class="pull-left" style="width: 100%;text-decoration:none; color: black;" href="solousuario.php?id=<?php echo $idusuario?>">
                    <h4 class="text-right">By <?php echo $nombre[1] ." ". $nombre[2] ?></h4>
                </a>
                <!-- DESCRIPCION DEL POST -->
                <p><?php echo $row['descripcion'] ?></p>
                <ul class="list-inline list-unstyled">
                    <!-- FECHA DE CREACION DEL POST -->
  			        <li><span><i class="glyphicon glyphicon-calendar"></i> Creado: <?php echo $row['creado'] ?></span></li>
                    <li>|</li>
                    <!-- FECHA EN EL QUE SE ACTUALIZO EL POST -->
                    <li><span><i class="glyphicon glyphicon-calendar"></i> Actualizado: <?php echo $row['actualizado'] ?></span></li>
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
        </div>
    <?php } ?>
</div>

<?php
include 'final.php'; // Coloco el footer en la pag
?>