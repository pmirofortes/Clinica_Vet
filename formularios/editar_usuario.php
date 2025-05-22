<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}


if (isset($_GET['dni_veterinario'])) {
    $dni = $_GET['dni_veterinario'];
    include('../servicios/conexion.php');
    $sql = "SELECT * FROM veterinario WHERE dni_veterinario='$dni'";
    $resultado = mysqli_query($conn, $sql);
    $veterinario = mysqli_fetch_assoc($resultado);
}else{
    header('Location: ../vistas/veterinarios.php');
    exit();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="../front/forms.css">
    <script src="../front/menu.js"></script>
   
</head>
<body>

    <nav class="menu" id="menu">
        <div class="contenido_menu">
            <img src="../media/cross.svg" alt="No se ha podido cargar la imagen" class="imagen_cruz" onclick="cerrarmenu()">

            <li><a href="../vistas/consultas.php" class="link active">Consultas</a>
            <li><a href="../vistas/dar_de_alta.php" class="link">Dar de alta</a>
            <li><a href="../vistas/tienda.php" class="link">Tienda</a>
                
        </div>

        
    </nav>

    <div class="boton_abrir_menu" id="boton">
        <img src="../media/menu.svg" alt="No se ha podido cargar la imagen" onclick="abrirmenu()">
    </div>

    <main id="layout">

    <a class="Btn" href="../procesos/logs/logout.php">
    
        <div class="sign"><svg viewBox="0 0 512 512"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"></path></svg></div>
        
        <div class="text">Logout</div>
    </a>

    <form action="../procesos/update/update_usuario.php" method="POST">
        
            <input type="text" required="" name="DNI" id="DNI" value="<?php echo $veterinario['dni_veterinario']; ?>">
            <label for="DNI">DNI</label>
            <input type="hidden" required="" name="DNI_original" id="DNI_original" value="<?php echo $veterinario['dni_veterinario']; ?>">
        

        
            <input type="text" required="" name="nombre" id="nombre" value="<?php echo $veterinario['nombre_veterinario']; ?>">
            <label for="nombre">Nombre</label>
        
        
            <input type="text" required="" name="apellidos" id="apellidos" value="<?php echo $veterinario['apellidos_veterinario']; ?>">
            <label for="apellidos">Apellidos</label>
        
        
            <input type="text" required="" name="edad" id="edad" value="<?php echo $veterinario['edad_veterinario']; ?>">
            <label for="edad">Edad</label>
        
        
            <input type="text" required="" name="localidad" id="localidad" value="<?php echo $veterinario['localidad_veterinario']; ?>">
            <label for="Localidad">Localidad</label>
        
        
            <input type="telf" required="" name="telefono" id="telefono" value="<?php echo $veterinario['telefono_veterinario']; ?>">
            <label for="telefono">Teléfono</label>
        
        
            <input type="mail" required="" name="mail" id="mail" value="<?php echo $veterinario['correo_veterinario']; ?>">
            <label for="mail">Correo</label>
        
        
            <input type="password" name="password_veterinario" id="password_veterinario" placeholder="Nueva contraseña">
            <label for="password_veterinario">Nueva Contraseña</label>
        
        <button type="submit" class="form_button">
            <span class="button__text">Actualizar</span>
            <span class="button__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                    <line y2="19" y1="5" x2="12" x1="12"></line>
                    <line y2="12" y1="12" x2="19" x1="5"></line>
                </svg>
            </span>
        </button>
    </form>
</main>
</body>
</html>