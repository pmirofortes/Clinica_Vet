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
    <header>
        <h1>Iniciar sesión</h1>
    </header>
    <section class="menu">
        <form action="../procesos/logs/login.php" method="POST">
            <label for="DNI">DNI:</label>
            <input type="text" id="DNI" name="DNI"><br><br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password"><br><br>
            <button type="submit">Iniciar sesión</button>
        </form>
    </section>
</body>
</html>