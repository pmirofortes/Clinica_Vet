<?php
session_start();
include("../../servicios/conexion.php");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar que se recibieron datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DNI']) && isset($_POST['password_veterinario'])) {
    $dni = $_POST['DNI'];
    $password = $_POST['password_veterinario'];

    // Consulta para obtener el hash del usuario
    $sql = "SELECT * FROM veterinario WHERE dni_veterinario = '$dni'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $veterinario = mysqli_fetch_assoc($result);
        $hash = $veterinario['password_veterinario'];

        // Verificar la contraseña ingresada con el hash
        if (password_verify($password, $hash)) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['usuario'] = $veterinario['nombre_veterinario'];
            $_SESSION['DNI'] = $dni;

            header("Location: ../../vistas/bienvenida.php");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: ../../vistas/login.php?error=1");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: ../../vistas/login.php?error=2");
        exit();
    }

} else {
    // Datos no válidos
    header("Location: ../../vistas/login.php?error=3");
    exit();
}
