<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}
var_dump($_POST);

if (isset($_POST['id_raza']) && isset($_POST['nombre_raza']) && isset($_POST['id_especie'])) {
    include_once '../../servicios/conexion.php';

    $id_raza = $_POST['id_raza'];
    $nombre = $_POST['nombre_raza'];
    $especie = $_POST['id_especie'];

    // Actualizar la raza en la base de datos
    $sql = "UPDATE raza SET nombre_raza = '$nombre', id_especie = '$especie' WHERE id_raza = $id_raza";
    if (mysqli_query($conn, $sql)) {
        header('Location: ../../index.php');
        exit();
    } else {
        echo "Error al actualizar la raza: " . mysqli_error($conn);
    }
} else {
    echo "electrolatino";
}
?>