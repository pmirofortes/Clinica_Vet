<?php
include_once '../../servicios/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DNI']) && $_POST['DNI'] != "" && $_POST['DNI'] != null && strlen($_POST['DNI']) > 0 && strlen($_POST['DNI']) <= 9 && (preg_match('/[a-zA-Z]/', $_POST['DNI']) == 1) && isset($_POST['password']) && $_POST['password'] != "" && $_POST['password'] != null && strlen($_POST['password'] > 8)){
    $dni = mysqli_real_escape_string($conn, $_POST['DNI']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Consulta para verificar las credenciales
    $sql = "SELECT * FROM veterinario WHERE dni_veterinario = '$dni'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $veterinario = mysqli_fetch_assoc($result);

        // Verificar la contraseña
        if (password_verify($password, $veterinario['password'])) {
            session_start();
            $_SESSION['usuario'] = $veterinario['nombre_veterinario'];
            $_SESSION['dni'] = $dni;
            header("Location: ../../vistas/bienvenida.php");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: ../../vistas/login.php?error=1");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: ../vistas/login.php?error=2");
        exit();
    }
} else {
    // Si no se accede mediante POST, redirigir al login
    header("Location: ../../vistas/login.php");
    exit();
}
?>