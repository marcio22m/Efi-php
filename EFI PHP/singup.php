<?php
include 'menu.php'; // Coloco el nav en la pag
?>

<!-- 
    Formulario de registro, donde se ingresa nombre emamil y contraseña
    de forma obligatoria, con campo requerido
    y apellido y avatar de forma opcional
-->
<form class="form2" action="datosregistro.php" method="post">
    <h2>Registro</h2>
    <p type="Nombre(*) :"><input name="nombre" required></input></p>
    <p type="Apellido :"><input name="apellido"></input></p>
    <p type="Email(*) :"><input name="email" type="email" required></input></p>
    <p type="Contraseña(*) :"><input type="password" name="password" required></input></p>
    <p type="Avatar(link) :"><input name="avatar"></input></p>
    <button class="button" type="sudmit" style="text-align: center;">Registrarse</button><br><br>
    <p> (*) = Campo obligatorio </p>
</form>

<?php
include 'final.php'; // Coloco el footer en la pag
?>