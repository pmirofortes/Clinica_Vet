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
$edad = $_POST['edad'];
$peso = $_POST['peso'];
$color = $_POST['color'];
$DNI_dueño = $_POST['dni_dueño'];
$DNI_vet = $_POST['dni_vet'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];

if (isset($nombre) && isset($edad) && isset($peso) && isset($color) && isset($DNI_dueño) && isset($especie) && isset($raza) && isset($DNI_vet) && $nombre != "" && $nombre != null && strlen($nombre) != 0 && $edad != "" && $edad != null && $peso != "" && $peso != null && $color != "" && $color != null && $DNI_dueño != "" && $DNI_dueño != null && strlen($DNI_dueño) > 0 && strlen($DNI_dueño) <= 9 && (preg_match('/[a-zA-Z]/', $DNI_dueño) == 1) && $DNI_vet != "" && $DNI_vet != null && strlen($DNI_vet) > 0 && strlen($DNI_vet) <= 9 && (preg_match('/[a-zA-Z]/', $DNI_vet) == 1) && $especie != "" && $especie != null && $raza != "" && $raza != null ) {
    // COMPROBAR QUE NO EXISTE LA MASCOTA
    $sql = "SELECT * FROM animal WHERE nombre_animal = '$nombre' AND dni_dueno = '$DNI_dueño'";
    $resultado = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('La mascota ya existe');</script>";
        echo "<script>window.location.href='../../formularios/registro_nueva_mascota.php';</script>";
    } else {
        // INSERTAR PROPIETARIO
        $sql = "INSERT INTO animal (nombre_animal, edad_animal, peso_animal, color_animal, dni_dueno, id_especie, id_raza, dni_veterinario) VALUES ('$nombre', '$edad', '$peso', '$color', '$DNI_dueño', '$especie', '$raza', '$DNI_vet')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../index.php");
        } else {
            echo "<script>alert('Error al registrar la mascota');</script>";
            echo "<script>window.location.href='../../formularios/registro_nueva_mascota.php';</script>";
        }
    }
} else {
    echo "<script>alert('Por favor, complete todos los campos.');</script>";
    echo "<script>window.location.href='../../formularios/registro_nueva_mascota.php';</script>";
}

?>