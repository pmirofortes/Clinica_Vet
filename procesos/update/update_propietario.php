<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}


include_once '../../servicios/conexion.php';

if (isset($_POST['DNI']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['edad']) && isset($_POST['localidad']) && isset($_POST['telefono']) && isset($_POST['mail']) && isset($_POST['DNI_original']) && strlen($_POST['DNI']) > 7 && strlen($_POST['DNI']) <= 9 && (preg_match('/[a-zA-Z]/', $_POST['DNI']) == 1) && $_POST['nombre'] != null && $_POST['nombre'] != "" && $_POST['apellidos'] != null && $_POST['apellidos'] != "" && $_POST['edad'] != null && $_POST['edad'] != "" && $_POST['localidad'] != null && $_POST['localidad'] != "" && $_POST['telefono'] != null && $_POST['telefono'] != "" && strlen($telefono) == 9 && $_POST['mail'] != null && $_POST['mail'] != "" && filter_var($mail, FILTER_VALIDATE_EMAIL) != false && strlen($_POST['DNI_original']) > 7 && strlen($_POST['DNI_original']) <= 9 && (preg_match('/[a-zA-Z]/', $_POST['DNI_original']) == 1)) {
    $dni = $_POST['DNI'];
    $dni_original = $_POST['DNI_original'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $localidad = $_POST['localidad'];
    $mail = $_POST['mail'];

    // Actualizar datos principales
    $sql = "UPDATE dueno SET 
        dni_dueno='$dni',
        nombre_dueno='$nombre', 
        apellidos_dueno='$apellidos', 
        telefono_dueno='$telefono', 
        localidad_dueno='$localidad', 
        correo_dueno='$mail' 
        WHERE dni_dueno='$dni_original'";
    
    $sql2 = "UPDATE animal SET dni_dueno='$dni' WHERE dni_dueno='$dni_original'";

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        session_start();
        $_SESSION['dni'] = $dni; // Actualizar la sesión con el nuevo DNI
        header("Location: ../../vistas/propietarios.php");
        exit();
    } else {
        echo "<script>alert('Error al actualizar el propietario');</script>";
        echo "<script>window.location.href='../../formularios/editar_propietario.php';</script>";
        exit();
    }
} else {
    echo "electrolatino";
    exit();
}



?>