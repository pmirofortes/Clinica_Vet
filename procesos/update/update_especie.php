<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}

if (isset($_POST['id_especie']) && isset($_POST['nombre']) && isset($_POST['nombre_cientifico']) && isset($_POST['clas'])) {
    include_once '../../servicios/conexion.php';

    $id_especie = $_POST['id_especie'];
    $nombre = $_POST['nombre'];
    $nombre_cientifico = $_POST['nombre_cientifico'];
    $clas = $_POST['clas'];

    // Actualizar la especie en la base de datos
    $sql = "UPDATE especie SET nombre_especie='$nombre', nombre_cientifico_especie='$nombre_cientifico', clasif_especie='$clas' WHERE id_especie='$id_especie'";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../../vistas/razas_especies.php');
        exit();
    } else {
        echo "<script>alert('Error al actualizar la especie.')</script>" . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Datos incompletos para actualizar la especie.')</script>";
    header('Location: ../../vistas/razas_especies.php');
}
?>