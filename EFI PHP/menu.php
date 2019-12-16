<?php
session_start();  // indico que voy a trabajar con sesion
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
</head>
<body>
<!--
    La siguiente seccion es el menu donde el usuario
    puede elegir acceder al login en la parte derecha
    y en la parte izquiera se encuentran los post
    
    Menu trabajado con Bootstrap 
-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark" style="height: 100px; text-align: center; width: 100%;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size: x-large">
            <ul class="navbar-nav mr-auto" style="width: 60%;">
                <li class="nav-item active" style="width: 20%;">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only"></span></a>
                </li>
                <?php if ($_SESSION) { ?> 
                <!-- Si hay una sesion activa, se muestra una seccion nueva para que 
                    el usuario pueda elegir ver, editar, eliminar y agregar nuevos post --> 
                <li class="nav-item active"  style="width: 20%;">
                    <a class="nav-link" href="mispost.php">Mis Post <span class="sr-only"></span></a>
                </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav mr-auto" style="float:right;">
                <?php if ($_SESSION) { ?>  
                    <!-- Si hay una sesion activa, se muestra el siguiente menu, cuenta y cerrar sesion -->
                    <li class="nav-item active" style="margin-right:50px;">
                        <a class="nav-link" href="perfil.php"> Cuenta: <?php echo $_SESSION['nombre'] ?> <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="cerrarsesion.php">Cerrar Sesion<span class="sr-only"></span></a>
                    </li>
                <?php } else { ?>
                    <!-- Si no hay una sesion activa, muestra el iniciar sesion y el registrarse -->
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php" style="margin-right:50px;">Iniciar Sesion<span class="sr-only"></span></a>
                    </li>   
                    <li class="nav-item active">
                        <a class="nav-link" href="singup.php">Registrarse<span class="sr-only"></span></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>