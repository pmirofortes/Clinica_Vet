<?php
include_once '../../servicios/conexion.php';
// COMPROBAR SESION
// asignar varibles por POST
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$DNI = $_POST['DNI'];
$fecha = $_POST['fecha'];
$telefono = $_POST['telefono'];
$localidad = $_POST['localidad'];
$mail = $_POST['mail'];

if (isset($nombre) && isset($apellidos) && isset($DNI) && isset($fecha) && isset($telefono) && isset($localidad) && isset($mail)) {
    // COMPROBAR QUE NO EXISTE EL PROPIETARIO
    $sql = "SELECT * FROM dueno WHERE dni_dueno = '$DNI'";
    $resultado = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('El propietario ya existe');</script>";
        echo "<script>window.location.href='../fomularios/registro_nuevo_propietario.php';</script>";
    } else {
        // INSERTAR PROPIETARIO
        $sql = "INSERT INTO dueno (nombre_dueno, apellidos_dueno, dni_dueno, edad_dueno, telefono_dueno, localidad_dueno, correo_dueno) VALUES ('$nombre', '$apellidos', '$DNI', '$fecha', '$telefono', '$localidad', '$mail')";
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