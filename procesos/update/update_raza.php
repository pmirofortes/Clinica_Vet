<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}

if (isset($_POST['id_raza']) && isset($_POST['nombre_raza']) && isset($_POST['id_especie'])) {
    include_once '../../servicios/conexion.php';

    $id_raza = mysqli_real_escape_string($conn, $_POST['id_raza']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre_raza']);
    $especie = mysqli_real_escape_string($conn, $_POST['id_especie']);

    // 1. Actualizar la raza
    $sql = "UPDATE raza SET nombre_raza = '$nombre', id_especie = '$especie' WHERE id_raza = $id_raza";

    // 2. Actualizar la especie de los animales que tienen esa raza
    $sql2 = "UPDATE animal SET id_especie = $especie WHERE id_raza = $id_raza";

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        header('Location: ../../vistas/razas_especies.php');
        exit();
    } else {
        echo "Error al actualizar: " . mysqli_error($conn);
    }
} else {
    echo "electrolatino";
}
?>
