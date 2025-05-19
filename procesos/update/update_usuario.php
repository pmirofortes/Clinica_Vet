<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}

if (isset($_POST['DNI']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['edad']) && isset($_POST['localidad']) && isset($_POST['telefono']) && isset($_POST['mail']) && isset($_POST['DNI_original'])) {
    include_once '../../servicios/conexion.php';

    $dni = $_POST['DNI'];
    $dni_original = $_POST['DNI_original'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $localidad = $_POST['localidad'];
    $mail = $_POST['mail'];

    // Actualizar datos principales
    $sql = "UPDATE veterinario SET 
        dni_veterinario='$dni',
        nombre_veterinario='$nombre', 
        apellidos_veterinario='$apellidos', 
        telefono_veterinario='$telefono', 
        localidad_veterinario='$localidad', 
        correo_veterinario='$mail' 
        WHERE dni_veterinario='$dni_original'";

    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION['dni'] = $dni; // Actualizar la sesión con el nuevo DNI
        // Si el usuario ha escrito una nueva contraseña, la actualizamos con hash
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql_pass = "UPDATE veterinario SET password='$hashed' WHERE dni_veterinario='$dni_original'";
            mysqli_query($conn, $sql_pass);
        }
        header("Location: ../../index.php");
        exit();
    } else {
        echo "<script>alert('Error al actualizar el usuario');</script>";
        echo "<script>window.location.href='../../formularios/editar_usuario.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Por favor, complete todos los campos');</script>";
    echo "<script>window.location.href='../../formularios/editar_usuario.php';</script>";
    exit();
}
?>