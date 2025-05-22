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
    <script src="../front/validaciones.js"></script>

   
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
<header><h1>Editar Veterinario</h1></header>
<section class= "form">
<form action="../procesos/update/update_usuario.php" method="POST">
    <label for="DNI">DNI</label>
    <input type="text" required name="DNI" id="dni" value="<?php echo $veterinario['dni_veterinario']; ?>" onblur="verificarDNI()">
    
    <span id="dniError" class="error"></span>
    <input type="hidden" required name="DNI_original" id="DNI_original" value="<?php echo $veterinario['dni_veterinario']; ?>">

    <label for="nombre">Nombre</label>
    <input type="text" required name="nombre" id="nombre" value="<?php echo $veterinario['nombre_veterinario']; ?>" onblur="verificarNombre()">
    <span id="errorNombre" class="error"></span>

    <label for="apellidos">Apellidos</label>
    <input type="text" required name="apellidos" id="apellidos" value="<?php echo $veterinario['apellidos_veterinario']; ?>" onblur="verificarApellidos()">
    <span id="errorApellidos" class="error"></span>

    <label for="edad">Edad</label>
    <input type="date" required name="edad" id="fecha" value="<?php echo $veterinario['edad_veterinario']; ?>" onblur="verificarEdad()">
    <span id="errorFecha" class="error"></span>

    <label for="Localidad">Localidad</label>
    <input type="text" required name="localidad" id="localidad" value="<?php echo $veterinario['localidad_veterinario']; ?>" onblur="verificarLocalidad()">
    <span id="errorLocalidad" class="error"></span>

    <label for="telefono">Teléfono</label>
    <input type="text" required name="telefono" id="telefono" value="<?php echo $veterinario['telefono_veterinario']; ?>" onblur="verificarTelefono()">
    
    <span id="errorTelefono" class="error"></span>

    <label for="mail">Correo</label>
    <input type="text" required name="mail" id="email" value="<?php echo $veterinario['correo_veterinario']; ?>" onblur="verificarEmail()">
    
    <span id="errorMail" class="error"></span>

    <label for="password_veterinario">Nueva Contraseña</label>
    <input type="password" name="password_veterinario" id="password" placeholder="Nueva contraseña" onblur="verificarPasswd()">
    
    <span id="errorPassword" class="error"></span>

    <input type="submit" name="actualizar_usuario" value="Actualizar Usuario">

</form>
</section>
</main>
</body>
</html>