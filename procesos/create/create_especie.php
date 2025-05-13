<?php
include_once '../../servicios/conexion.php';
// COMPROBAR SESION
// asignar varibles por POST
$nombre = $_POST['nombre'];
$nombre_cientifico = $_POST['nombre_cientifico'];
$clas = $_POST['clas'];

if (isset($nombre) && isset($nombre_cientifico) && isset($clas)) {
    // COMPROBAR QUE NO EXISTE LA ESPECIE
    $sql = "SELECT * FROM especie WHERE nombre_especie = '$nombre'";
    $resultado = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('La especie ya existe');</script>";
        echo "<script>window.location.href='../fomularios/registro_nueva_especie.php';</script>";
    } else {
        // INSERTAR PROPIETARIO
        $sql = "INSERT INTO especie (nombre_especie, nombre_cientifico_especie, clasif_especie) VALUES ('$nombre', '$nombre_cientifico', '$clas')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../index.php");
        } else {
            echo "<script>alert('Error al registrar la especie');</script>";
            echo "<script>window.location.href='../fomularios/registro_nueva_especie.php';</script>";
        }
    }
} else {
    echo "<script>alert('Por favor, complete todos los campos');</script>";
    echo "<script>window.location.href='../fomularios/registro_nueva_especie.php';</script>";
}

?>