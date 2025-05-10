<!-- <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// resto del código...
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de mascota</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <style>
        /* Estilos para los campos de texto */
        .input-verde {
            border: 2px solid green;
        }

        .input-rojo {
            border: 2px solid red;
        }

        .mensaje {
            font-weight: bold;
            margin-top: 10px;
        }

        .mensaje-verde {
            color: green;
        }

        .mensaje-rojo {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <h1>Registro de Mascota</h1>
    </header>
    <div class="layout">
        <section class="menu">
            <li><a href="../index.php" class="link"><img src="../media/lupa.png" class= "icono">Consultar mascotas</a></li>
            <li><a href="../fomularios/registro_nueva_mascota.php" class="link active">Dar de alta mascota</a></li>
            <li><a href="../fomularios/registro_nuevo_propietario.php" class="link">Dar de alta propietario</a></li>
            <li><a href="../fomularios/registro_nuevo_usuario.php" class="link"><img src="../media/veterinario.png" class="icono">Dar de alta veterinario</a></li>
        </section>

        <?php
        include_once '../servicios/conexion.php';

        $mensaje = "";
        $claseInput = "";
        $dniValido = false; // Variable para controlar si el DNI es válido

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar_dni'])) {
            $dni = mysqli_real_escape_string($conn, $_POST['dueño']);
            $sql = "SELECT nombre_dueno, apellidos_dueno FROM dueno WHERE dni_dueno = '$dni'";
            $resultado = mysqli_query($conn, $sql);

            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $row = mysqli_fetch_assoc($resultado);
                $mensaje = "Dueño encontrado: " . $row['nombre_dueno'] . " " . $row['apellidos_dueno'];
                $claseInput = "input-verde";
                $dniValido = true; // El DNI es válido
            } else {
                $mensaje = "No se encontró ningún dueño con ese DNI.";
                $claseInput = "input-rojo";
                $dniValido = false; // El DNI no es válido
            }
        }
        ?>

        <section class="form">
            <!-- Formulario para buscar DNI -->
            <form action="" method="post">
                <label for="nombre">Nombre de la mascota:</label><br>
                <input type="text" id="nombre" name="nombre"><br><br>
                
                <label for="edad">Edad:</label><br>
                <input type="date" id="edad" name="edad"><br><br>

                <label for="peso">Peso:</label><br>
                <input type="number" id="peso" name="peso"><br><br>
                
                <label for="color">Color:</label><br>
                <input type="text" id="color" name="color"><br><br>

                <label for="dueño">Dueño (DNI):</label><br>
                <input type="text" id="dueño" name="dueño" class="<?php echo $claseInput; ?>" value='<?php echo isset($_POST["dueño"]) ? ($_POST["dueño"]) : ""; ?>'>
                <button type="submit" name="buscar_dni">Buscar DNI</button><br><br>
                
                <?php if (!empty($mensaje)): ?>
                    <p class="mensaje <?php echo $claseInput === 'input-verde' ? 'mensaje-verde' : 'mensaje-rojo'; ?>">
                        <?php echo $mensaje; ?>
                    </p>
                <?php endif; ?>

                <label for="especie">Especie:</label><br>
                <select name="especie">
                    <option value="">Seleccionar especie</option>
                    <?php
                    $sql = "SELECT id_especie, nombre_especie FROM especie";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_especie'] . "'>" . $row['nombre_especie'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Error al cargar especies</option>";
                    }
                    ?>
                </select><br><br>

                <label for="raza">Raza:</label><br>
                <input type="text" id="raza" name="raza"><br><br>

            </form>

            <!-- Formulario para registrar mascota -->
            <form action="../procesos/create/create_mascota.php" method="post">
                <input type="hidden" name="nombre" value="<?php echo isset($_POST['nombre']) ? ($_POST['nombre']) : ''; ?>">
                <input type="hidden" name="tipo" value="<?php echo isset($_POST['tipo']) ? ($_POST['tipo']) : ''; ?>">
                <input type="hidden" name="raza" value="<?php echo isset($_POST['raza']) ? ($_POST['raza']) : ''; ?>">
                <input type="hidden" name="edad" value="<?php echo isset($_POST['edad']) ? ($_POST['edad']) : ''; ?>">
                <input type="hidden" name="peso" value="<?php echo isset($_POST['peso']) ? ($_POST['peso']) : ''; ?>">
                <input type="hidden" name="color" value="<?php echo isset($_POST['color']) ? ($_POST['color']) : ''; ?>">
                <input type="hidden" name="dueño" value="<?php echo isset($_POST['dueño']) ? ($_POST['dueño']) : ''; ?>">
                <input type="submit" value="Registrar Mascota" <?php echo $dniValido ? '' : 'disabled'; ?>>
            </form>
        </section>
    </div>
</body>
</html>