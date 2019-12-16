<?php
include 'menu.php'; // Coloco el nav en la pag
?>

<!-- Formulario para ingresar el email -->
<form class="form4" action="datosrecuperarpassword.php" method="post">
    <h2>Recuperar Contraseña</h2>
    <p> Email : </p> <input name="email"> </input>
    <button class="button" type="sudmit">Mandar mensaje con nueva contraseña</button>
</form>

<?php
include 'final.php'; // Coloco el footer en la pag
?>
