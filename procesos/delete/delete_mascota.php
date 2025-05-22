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
if (isset($_GET['id_animal'])) {
    $id_animal = $_GET['id_animal'];
} else {
    // Redirigir a la página de error o mostrar un mensaje de error
    header('Location: ../../index.php?msg=0');
    exit();
}

 // primero consultamos si existe la mascota en la base de datos

$sql = "SELECT * FROM animal WHERE id_animal = $id_animal";
    $resultado = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        $sql = "DELETE FROM animal WHERE id_animal = $id_animal";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
            alert('Mascota eliminada correctamente');
            window.location.href='../../index.php?msg=1';
        </script>";
        exit();
        } else {
            echo "<script>alert('Error al eliminar la mascota');</script>";
            echo "<script>window.location.href='../../index.php?msg=0';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Error al eliminar la mascota');</script>";
        echo "<script>window.location.href='// filepath: vsls:/procesos/delete/delete_mascota.php../../index.php?msg=0';</script>";
        exit();
    }


?>