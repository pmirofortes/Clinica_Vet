<?php

include_once "../../servicios/conexion.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../vistas/login.php");
    exit();
}

if (isset($_GET['id_especie'])) {
    $id_especie = $_GET['id_especie'];
} else {
    // Redirigir a la página de error o mostrar un mensaje de error
    header('Location: ../../index.php?msg=0');
    exit();
}

// comprobar que exista la especie y eliminarla

$sql = "SELECT * FROM especie WHERE id_especie = $id_especie";
    $resultado = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        $sql = "DELETE FROM especie WHERE id_especie = $id_especie";
        // elimina la raza relacionada
        $sql2 = "DELETE FROM raza WHERE id_especie = $id_especie";
        // elimina los animales relacionados
        $sql3 = "DELETE FROM animal WHERE id_especie = $id_especie";
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
            echo "<script>
            alert('Especie eliminada correctamente');
            window.location.href='../../index.php?msg=1';
        </script>";
        exit();
    } else {
        echo "<script>alert('Error al eliminar la especie');</script>";
        echo "<script>window.location.href='// filepath: vsls:/procesos/delete/delete_especie.php../../index.php?msg=0';</script>";
        exit();
    }
    }

?>