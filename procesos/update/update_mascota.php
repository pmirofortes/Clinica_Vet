<?php
include_once '../../servicios/conexion.php';

if (isset($_POST['id_animal']) && isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['peso']) && isset($_POST['color']) && isset($_POST['dni_dueño']) && isset($_POST['dni_vet'])) {
    $id_animal = $_POST['id_animal'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $color = $_POST['color'];
    $dni_dueño = $_POST['dni_dueño'];
    $dni_vet = $_POST['dni_vet'];

} else {
    header('Location: ../../index.php');
    exit();
}

$sql = "UPDATE animal SET nombre_animal = '$nombre', edad_animal = '$edad', peso_animal = '$peso', color_animal = '$color', dni_dueno = '$dni_dueño', dni_veterinario = '$dni_vet' WHERE id_animal = $id_animal";
if (mysqli_query($conn, $sql)) {
    // Redirigir a la página de consulta de mascotas
    header('Location: ../../index.php');
} else {
    echo "Error al actualizar la mascota: " . mysqli_error($conn);
}
?>