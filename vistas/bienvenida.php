<?php
    // session_start();
    // if (!isset($_SESSION['usuario'])) {
    //     header("Location: ./vistas/login.php");
    //     exit();
    // }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
</head>
<body>

    <main>

        <section class="contenido_bienvenida">


            <!-- Bocadillo (dónde habla el perro) -->
            <section class="bienvenida_bocadillo">

                <!-- Lo que dice el perro -->
                <article class="contenido_bienvenida_texto">

                    <p class="bienvenida_texto">Bienvenid@ a</p>

                    <h2 class="bienvenida_titulo">¡VETNATURE!</h2>

                </article>

                <!-- Botón de entrar -->
                <article class="contenido_bienvenida_boton">

                    <a href="../index.php" class="bienvenida_boton">   

                        <div class="palo"></div>

                        <div class="entrar">< Entrar > </div>
                          

                        
                        
                    </a>
                    

                </article>

            </section>

            <!-- Perro -->
            <article>

                <img src="../media/dog.png" alt="No se ha podido cargar la imagen" class="bienvenida_perro">

            </article>


        </section>




    </main>


</body>
</html>