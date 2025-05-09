<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ./vistas/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
    <link rel="stylesheet" href="../front/estilos.css">
</head>
<body>

    <?php

    include('./servicios/conexion.php');

    ?>

    <main>

        


    </main>
</body>
</html>