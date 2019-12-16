<?php

session_start(); // Indico que quiero trabajar con sesion
session_destroy(); // Destruyo la sesion actual

header('Location: index.php'); // Reubico al inicio

?>