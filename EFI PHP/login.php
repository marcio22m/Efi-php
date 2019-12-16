<?php
include 'menu.php'; // Coloco el nav en la pag
?>

<!--
    Formulario donde el usuario ingresa el mail y contraseña
    Ambos campos son requeridos
 -->
<form class="form1" action="datosiniciosesion.php" method="post">
    <h2>Iniciar Sesion</h2>
    <p type="Email :"><input name="email" type="email" required></input></p>
    <p type="Contraseña :"><input type="password" name="password" required></input></p>
    <button class="button" type="sudmit">Iniciar</button>
</form>
<!-- Sector donde se puede recuperar la contraseña -->
<div class="recuperarcontra">
    <a href="recuperarpassword.php"><button class="button">Recuperar contraseña</button></a>
</div>

<?php
include 'final.php'; // Coloco el footer en la pag
?>
