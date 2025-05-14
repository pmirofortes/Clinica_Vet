<?php
include_once '../../servicios/conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}

// asignar varibles por POST
$nombre = $_POST['nombre'];
$especie = $_POST['especie'];

if (isset($nombre) && isset($especie)) {
    // COMPROBAR QUE NO EXISTE LA RAZA
    $sql = "SELECT * FROM raza WHERE nombre_raza = '$nombre'";
    $resultado = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('La raza ya existe');</script>";
        echo "<script>window.location.href='../formularios/registro_nueva_raza.php';</script>";
    } else {
        // INSERTAR PROPIETARIO
        $sql = "INSERT INTO raza (nombre_raza, id_especie) VALUES ('$nombre', '$especie')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../index.php");
        } else {
            echo "<script>alert('Error al registrar la raza');</script>";
            echo "<script>window.location.href='../formularios/registro_nueva_raza.php';</script>";
        }
    }
} else {
    echo "<script>alert('Por favor, complete todos los campos');</script>";
    echo "<script>window.location.href='../formularios/registro_nueva_raza.php';</script>";
}

?>