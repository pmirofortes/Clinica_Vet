<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}
var_dump($_POST);

if (isset($_POST['id_especie']) && isset($_POST['nombre_especie'])) {
    include_once '../../servicios/conexion.php';

    $id_especie = $_POST['id_especie'];
    $nombre = $_POST['nombre_especie'];

    // Actualizar la especie en la base de datos
    $sql = "UPDATE especie SET especie = '$nombre' WHERE id_especie = $id_especie";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../../vistas/razas_especies.php');
        exit();
    } else {
        echo "<script>alert("Error al actualizar la especie.")</script>" . mysqli_error($conn);
    }
} else {
    echo "<script>alert("Datos incompletos para actualizar la especie.")</script>";
}
?>