<?php
include_once '../servicios/conexion.php';
$true = 1;
if ($true = 1){
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location: ../vistas/compra.php");
} else {
    header("Location: ../vistas/login.php?error=1");
    exit();
}
?>