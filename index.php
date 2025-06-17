<?php
session_start();

if (isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE) {
    header("Location: principal/inicio.php");
}
else {
    header("Location: login/login.php");
}

?>