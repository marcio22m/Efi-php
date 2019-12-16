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
    de la categoria seleccionada
    en el orden de primero el mas nuevo.
    Interfaz de blog sacada de bootstrap
-->
<?php
$idcategoria = $_POST['idcategoria']; // Almaceno en $nombre el nombre de la categoria seleccionada
$query ="SELECT * FROM publicaciones WHERE categoria_id = '$idcategoria' ORDER BY creado DESC"; 
    // Traigo todos los post, ya ordenados por su campo de fecha de creacion
    $resultado=mysqli_query($mysqli,$query);
    // Mediante el while, voy a mostrar por pantalla todos los post traidos
    while ($row = mysqli_fetch_array($resultado)){
    ?>
        <a class="pull-left" style="width: 100%;text-decoration:none; color: black;" href="#">
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
                    <h4 class="text-right">By <?php echo $nombre[1] ." ". $nombre[2] ?></h4>
                    <!-- DESCRIPCION DEL POST -->
                    <p><?php echo $row['descripcion'] ?></p>
                    <br>
                    <ul class="list-inline list-unstyled">
                        <!-- FECHA DE CREACION DEL POST -->
  			            <li><span><i class="glyphicon glyphicon-calendar"></i> Creado: <?php echo $row['creado'] ?></span></li>
                        <li>|</li>
                        <!-- FECHA EN EL QUE SE ACTUALIZO EL POST -->
                        <li><span><i class="glyphicon glyphicon-calendar"></i> Actualizado: <?php echo $row['actualizado'] ?></span></li>      
			        </ul>
                </div>
            </div>
        </div>
        </a>
<?php
    }
    include 'final.php'; // Coloco el footer en la pag
?>