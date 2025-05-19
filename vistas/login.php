<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>

</head>
<body>
    <div class="login wrap">
        <div class="h1">Login</div>
        <form class="form" action="../procesos/logs/login.php" method="POST">
            <input placeholder="DNI" id="DNI" name="DNI" type="text">
            <input placeholder="Contraseña" id="password" name="password" type="password">
            <button class="login-btn">Iniciar Sesión<div class="arrow-wrapper"><div class="arrow"></div></div></button>
        </form> 
        <a href="../formularios/registro_nuevo_usuario.php">Crear cuenta</a>
    </div>

    <?php
    
        if(isset($_GET['error']) && $_GET['error'] == 1){
            ?><script>alert("La contraseña no es correcta, por favor")</script><?php
        }
    
    ?>


</body>
</html>

