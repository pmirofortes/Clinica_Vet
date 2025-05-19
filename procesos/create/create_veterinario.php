<?php

include_once '../../servicios/conexion.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$DNI = $_POST['DNI'];
$fecha = $_POST['fecha'];
$telefono = $_POST['telefono'];
$localidad = $_POST['localidad'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if (isset($nombre, $apellidos, $DNI, $fecha, $telefono, $localidad, $mail, $password, $confirmPassword)) {
    // Verificar que las contraseñas coincidan
    if ($password !== $confirmPassword) {
        echo "<script>alert('Las contraseñas no coinciden');</script>";
        echo "<script>window.location.href='../../formularios/registro_nuevo_usuario.php';</script>";
        exit();
    }

    // Comprobar que no existe el veterinario
    $sql = "SELECT * FROM veterinario WHERE dni_veterinario = '$DNI'";
    $resultado = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('El veterinario ya existe');</script>";
        echo "<script>window.location.href='../../formularios/registro_nuevo_usuario.php';</script>";
        exit();
    }

    // Encriptar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertar veterinario
    $sql = "INSERT INTO veterinario (nombre_veterinario, apellidos_veterinario, dni_veterinario, edad_veterinario, telefono_veterinario, localidad_veterinario, correo_veterinario, password) 
            VALUES ('$nombre', '$apellidos', '$DNI', '$fecha', '$telefono', '$localidad', '$mail', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Veterinario registrado exitosamente');</script>";
        session_start();
        $_SESSION['DNI'] = $DNI; // Guardar el DNI en la sesión
        header("Location: ../../index.php");
        exit();
    } else {
        echo "<script>alert('Error al registrar el veterinario');</script>";
        echo "<script>window.location.href='../../formularios/registro_nuevo_usuario.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Por favor, complete todos los campos');</script>";
    echo "<script>window.location.href='../../formularios/registro_nuevo_usuario.php';</script>";
    exit();
}
?>