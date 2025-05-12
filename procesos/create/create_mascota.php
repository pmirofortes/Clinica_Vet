<?php
include_once '../../servicios/conexion.php';
// COMPROBAR SESION
// asignar varibles por POST
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$peso = $_POST['peso'];
$color = $_POST['color'];
$DNI_dueño = $_POST['DNI'];
$DNI_vet = $_POST['DNI_vet'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];

if (isset($nombre) && isset($edad) && isset($peso) && isset($color) && isset($DNI_dueño) && isset($especie) && isset($raza) && isset($DNI_vet)) {
    // COMPROBAR QUE NO EXISTE EL PROPIETARIO
    $sql = "SELECT * FROM dueno WHERE dni_dueno = '$DNI'";
    $resultado = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('El propietario ya existe');</script>";
        echo "<script>window.location.href='../fomularios/registro_nuevo_propietario.php';</script>";
    } else {
        // INSERTAR PROPIETARIO
        $sql = "INSERT INTO animal (nombre_animal, edad_animal, peso_animal, color_animal, dni_dueno, id_especie, id_raza, dni_veterinario) VALUES ('$nombre', '$edad', '$peso', '$color', '$DNI_dueño', '$especie', '$raza', '$DNI_vet')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../index.php");
        } else {
            echo "<script>alert('Error al registrar el propietario');</script>";
            echo "<script>window.location.href='../fomularios/registro_nuevo_propietario.php';</script>";
        }
    }
} else {
    echo "<script>alert('Por favor, complete todos los campos');</script>";
    echo "<script>window.location.href='../fomularios/registro_nuevo_propietario.php';</script>";
}

?>