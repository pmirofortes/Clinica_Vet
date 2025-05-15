<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}
var_dump($_POST);
exit();
if (isset($_POST['DNI']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['edad']) && isset($_POST['localidad']) && isset($_POST['telefono']) && isset($_POST['mail']) && isset($_POST['password'])) {
    include_once '../../servicios/conexion.php';

    $dni = mysqli_real_escape_string($conn, $_POST['DNI']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $localidad = mysqli_real_escape_string($conn, $_POST['localidad']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);

    // Actualizar propietario
    $sql = "UPDATE propietario SET nombre_propietario='$nombre', apellidos_propietario='$apellidos', telefono_propietario='$telefono', localidad_propietario='$localidad', correo_propietario='$mail' WHERE dni_propietario='$dni'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Propietario actualizado exitosamente');</script>";
        header("Location: ../../index.php");
        exit();
    } else {
        echo "<script>alert('Error al actualizar el propietario');</script>";
        echo "<script>window.location.href='../../formularios/editar_usuario.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Por favor, complete todos los campos');</script>";
    echo "<script>window.location.href='../../formularios/editar_usuario.php';</script>";
}
?>