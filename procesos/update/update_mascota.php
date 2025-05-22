<?php
include_once '../../servicios/conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}

if (isset($_POST['id_animal'], $_POST['nombre'], $_POST['edad'], $_POST['peso'], $_POST['color'], $_POST['dni_dueno'], $_POST['dni_vet'], $_POST['especie'], $_POST['raza']) && $_POST['nombre'] !== "" && $_POST['edad'] !== "" && $_POST['peso'] !== "" && $_POST['color'] !== "" && strlen($_POST['dni_vet']) > 7 && strlen($_POST['dni_vet']) <= 9) {
    $id_animal = $_POST['id_animal'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $color = $_POST['color'];
    $dni_dueno = $_POST['dni_dueno'];
    $dni_vet = $_POST['dni_vet'];
    $especie = $_POST['especie'];
    $raza = $_POST['raza'];

    $sql = "UPDATE animal SET 
        nombre_animal = '$nombre', 
        edad_animal = '$edad', 
        peso_animal = '$peso', 
        color_animal = '$color', 
        dni_dueno = '$dni_dueno', 
        dni_veterinario = '$dni_vet',
        id_especie = '$especie',
        id_raza = '$raza'
        WHERE id_animal = $id_animal";
    if (mysqli_query($conn, $sql)) {
        header('Location: ../../index.php?msg=actualizado');
        exit();
    } else {
        echo "Error al actualizar la mascota: " . mysqli_error($conn);
    }
} else {
    header('Location: ../../index.php');
    exit();
}
?>