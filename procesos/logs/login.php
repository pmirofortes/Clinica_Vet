<?php
include_once '../../servicios/conexion.php';

// Verificar conexión a la base de datos
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Iniciar buffer de salida
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DNI']) && isset($_POST['password_veterinario'])) {
    // Limpiar y validar datos de entrada
    $dni = trim($_POST['DNI']);
    $password = $_POST['password_veterinario'];
    
    // Validar formato de DNI (8 números + 1 letra)
    if (!preg_match('/^[0-9]{8}[a-zA-Z]$/', $dni)) {
        header("Location: ../../vistas/login.php?error=3"); // Error de formato DNI
        exit();
    }
    
    // Validar longitud de contraseña
    if (strlen($password) < 9) {
        header("Location: ../../vistas/login.php?error=4"); // Contraseña demasiado corta
        exit();
    }
    
    // Consulta preparada para prevenir inyección SQL
    $sql = "SELECT * FROM veterinario WHERE dni_veterinario = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt !== false) {
        mysqli_stmt_bind_param($stmt, "s", $dni);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $veterinario = mysqli_fetch_assoc($result);
            
            // Depuración: Mostrar información para diagnóstico
            error_log("Contraseña recibida: " . $password);
            error_log("Hash almacenado: " . $veterinario['password_veterinario']);
            error_log("Resultado de verificación: " . password_verify($password, $veterinario['password_veterinario']));
            
            // Verificar contraseña hasheada
            if (password_verify($password, $veterinario['password_veterinario'])) {
                session_start();
                $_SESSION['usuario'] = $veterinario['nombre_veterinario'];
                $_SESSION['DNI'] = $dni;
                
                // Regenerar ID de sesión para prevenir fixation
                session_regenerate_id(true);
                
                // Redirigir a la página de bienvenida
                header("Location: ../../vistas/bienvenida.php");
                exit();
            } else {

                echo "<p>" . (password_verify($password, $veterinario['password_veterinario'])) . "</p>";

                // Contraseña incorrecta
                error_log("Fallo en la verificación de contraseña para DNI: " . $dni);
                header("Location: ");
                // header("Location: ../../vistas/login.php?error=1");
                // exit();
            }
        } else {
            // Usuario no encontrado
            error_log("Usuario no encontrado con DNI: " . $dni);
            header("Location: ../../vistas/login.php?error=2");
            exit();
        }
        
        mysqli_stmt_close($stmt);
    } else {
        // Error en la preparación de la consulta
        error_log("Error en preparación de consulta: " . mysqli_error($conn));
        header("Location: ../../vistas/login.php?error=5");
        exit();
    }
} else {
    // Datos del formulario incompletos
    header("Location: ../../vistas/login.php?error=6");
    exit();
}

// Cerrar conexión
mysqli_close($conn);

// Limpiar buffer
ob_end_flush();
?>