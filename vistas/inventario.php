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
    <title>Inventario</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
</head>
<body>
    <section>
        <nav>
            <li><a href="../fomularios/registro_nuevo_propietario.php">link a la pagina de registro de propietario</a></li>
            <li><a href="../fomularios/registro_nueva_mascota.php">link a la pagina de registro de mascotas</a></li>
            <li><a href="../index.php">link a la pagina principal</a></li>
        </nav>
    </section>
    <!-- mostrar aqui tabla de compras -->

    <main>

        <section>

            <!-- Bocadillo (dónde habla el perro) -->
            <section>

                <!-- Lo que dice el perro -->
                <article>

                    <p>¡Bienvenid@ a</p>

                    <h2>NOMBRE DE LA EMPRESA</h2>

                </article>

                <!-- Botón de entrar -->
                <article>

                    <a href="../index.php">Entrar</a>

                </article>

            </section>

            <!-- Perro -->
            <article>

                <img src="" alt="">

            </article>


        </section>



    </main>


</body>
</html>