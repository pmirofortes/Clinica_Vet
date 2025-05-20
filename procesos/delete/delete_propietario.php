<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}


include_once '../../servicios/conexion.php';

if (isset($_GET['dni_dueno']) ) {
    $dni = $_GET['dni_dueno'];

    // Eliminar propietario
    $sql = "DELETE FROM dueno WHERE dni_dueno='$dni'";
    $sql2 = "DELETE FROM animal WHERE dni_dueno='$dni'";
    
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        header("Location: ../../vistas/propietarios.php");
        exit();
    } else {
        echo "<script>alert('Error al eliminar el propietario');</script>";
        echo "<script>window.location.href='../../vistas/propietarios.php';</script>";
        exit();
    }
} else {
    echo "electrolatino";
    exit();
}


?>