<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}


include_once '../../servicios/conexion.php';

if (isset($_GET['dni_veterinario']) ) {
    $dni = $_GET['dni_veterinario'];

    // Eliminar veterinario
    $sql = "DELETE FROM veterinario WHERE dni_veterinario='$dni'";
    $sql2 = "UPDATE animal SET dni_veterinario='no tiene' WHERE dni_veterinario='$dni'";
    
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        header("Location: ../../vistas/veterinarios.php");
        exit();
    } else {
        echo "<script>alert('Error al eliminar el veterinario');</script>";
        echo "<script>window.location.href='../../vistas/veterinarios.php';</script>";
        exit();
    }
} else {
    echo "electrolatino";
    exit();
}


?>