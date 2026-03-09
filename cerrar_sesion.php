<?php
session_start();
session_unset();
session_destroy();

header("Location: html/htmlAndres/inicio_sesion.html");
exit();
?>