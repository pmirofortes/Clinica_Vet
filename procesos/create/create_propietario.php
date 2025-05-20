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
$apellidos = $_POST['apellidos'];
$DNI = $_POST['DNI'];
$fecha = $_POST['fecha'];
$fechaActual = date("Y-m-d");
$fecha_restar = date("Y");
$telefono = $_POST['telefono'];
$localidad = $_POST['localidad'];
$mail = $_POST['mail'];

if (isset($nombre) && isset($apellidos) && isset($DNI) && isset($fecha) && isset($telefono) && isset($localidad) && isset($mail) && strlen($nombre) > 2 && $nombre != "" && $nombre != null && $apellidos != "" && $apellidos != null && strlen($DNI) > 7 && strlen($DNI) <= 9 && (preg_match('/[a-zA-Z]/', $DNI) == 1) && $fecha != "" && $fecha != null && $telefono != "" && $telefono != null && strlen($telefono) == 9 && $localidad != "" && $localidad != null && $mail != "" && $mail != null && filter_var($mail, FILTER_VALIDATE_EMAIL) != false && $fecha <= $fechaActual && $fecha > ($fecha_restar - 100)) {
    // COMPROBAR QUE NO EXISTE EL PROPIETARIO
    $sql = "SELECT * FROM dueno WHERE dni_dueno = '$DNI'";
    $resultado = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('El propietario ya existe');</script>";
        echo "<script>window.location.href='../formularios/registro_nuevo_propietario.php';</script>";
    } else {
        // INSERTAR PROPIETARIO
        $sql = "INSERT INTO dueno (nombre_dueno, apellidos_dueno, dni_dueno, edad_dueno, telefono_dueno, localidad_dueno, correo_dueno) VALUES ('$nombre', '$apellidos', '$DNI', '$fecha', '$telefono', '$localidad', '$mail')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../index.php");
        } else {
            echo "<script>alert('Error al registrar el propietario');</script>";
            echo "<script>window.location.href='../formularios/registro_nuevo_propietario.php';</script>";
        }
    }
} else {
    echo "<script>alert('Por favor, complete todos los campos.');</script>";
    echo "<script>window.location.href='../formularios/registro_nuevo_propietario.php';</script>";
}

?>