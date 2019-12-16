<?php
include 'menu.php'; // Coloco el nav en la pag
?>

<!--
    Formulario donde el usuario ingresa su nueva contraseña
    Ambos campos son requeridos
 -->
<form class="form4" action="datosnuevapassword.php" method="post">
    <h2>Cambio de contraseña</h2>
    <p type="Nueva contraseña :"><input name="password" required></input></p>
    <button class="button" type="sudmit">Guardar</button>
</form>

<?php
include 'final.php'; // Coloco el footer en la pag
?>
