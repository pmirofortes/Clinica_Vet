<?php

include_once "../../servicios/conexion.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}

if (isset($_GET['id_raza'])) {
    $id_raza = $_GET['id_raza'];
} else {
    // Redirigir a la página de error o mostrar un mensaje de error
    header('Location: ../../index.php?msg=0');
    exit();
}

// comprobar que exista la raza y eliminarla

$sql = "SELECT * FROM raza WHERE id_raza = $id_raza";
$resultado = mysqli_query($conn, $sql);
if (mysqli_num_rows($resultado) > 0) {
    // Primero elimina los animales relacionados
    $sql2 = "DELETE FROM animal WHERE id_raza = $id_raza";
    mysqli_query($conn, $sql2);

    // Luego elimina la raza
    $sql = "DELETE FROM raza WHERE id_raza = $id_raza";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Raza eliminada correctamente');
            window.location.href='../../index.php?msg=1';
        </script>";
        exit();
    } else {
        echo "<script>alert('Error al eliminar la raza');</script>";
        echo "<script>window.location.href='// filepath: vsls:/procesos/delete/delete_raza.php../../index.php?msg=0';</script>";
        exit();
    }
}
?>
