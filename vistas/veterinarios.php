<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ./login.php");
    exit();
}

include('../servicios/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinarios</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/menu.js"></script>

    <style>

    h1{
        margin-top: 2%;
        margin-left: 40%;
        margin-bottom: 3%;
    }

        /* Estilos generales del formulario */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9; /* Fondo gris claro */
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
}

/* Estilos para los campos de texto */
input[type="text"] {
    border: 2px solid purple; /* Borde morado */
    padding: 10px;
    margin: 10px 0;
    width: 100%; /* Asegura que los campos llenen el ancho del formulario */
    border-radius: 5px; /* Bordes redondeados */
    font-size: 14px;
    transition: border-color 0.3s ease; /* Transición suave */
}

/* Cambiar el borde a morado más oscuro al hacer focus en los campos */
input[type="text"]:focus {
    border-color: #800080; /* Color morado más oscuro */
    outline: none; /* Quitar el borde de enfoque por defecto */
}

/* Estilos para el botón "Filtrar" */
button[type="submit"] {
    background-color: purple; /* Fondo morado */
    color: white; /* Texto blanco */
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

/* Efecto hover en el botón "Filtrar" */
button[type="submit"]:hover {
    background-color: #800080; /* Fondo morado más oscuro cuando pasa el mouse */
}

/* Estilos para el botón "Quitar filtros" */
button[type="button"] {
    background-color: #E0B0FF; /* Morado claro */
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

/* Efecto hover en el botón "Quitar filtros" */
button[type="button"]:hover {
    background-color: #D8A7FF; /* Tono morado más oscuro al hacer hover */
}

/* Estilos para los placeholders */
input[type="text"]::placeholder {
    color: purple; /* Color morado para el texto del placeholder */
    opacity: 0.7; /* Hacer que el placeholder sea un poco más tenue */
}
    </style>
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

    <h1>Consulta Veterinario</h1>
    <section>
        <form method="get" style="margin-bottom:20px; display:flex; gap:1rem; align-items:center;">
            <input type="text" name="nombre" placeholder="Nombre" value="<?= isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '' ?>">
            <input type="text" name="apellidos" placeholder="Apellidos" value="<?= isset($_GET['apellidos']) ? htmlspecialchars($_GET['apellidos']) : '' ?>">
            <input type="text" name="dni" placeholder="DNI" value="<?= isset($_GET['dni']) ? htmlspecialchars($_GET['dni']) : '' ?>">
            <input type="text" name="localidad" placeholder="Localidad" value="<?= isset($_GET['localidad']) ? htmlspecialchars($_GET['localidad']) : '' ?>">
            <input type="text" name="telefono" placeholder="Teléfono" value="<?= isset($_GET['telefono']) ? htmlspecialchars($_GET['telefono']) : '' ?>">
            <input type="text" name="correo" placeholder="Correo" value="<?= isset($_GET['correo']) ? htmlspecialchars($_GET['correo']) : '' ?>">
            <button type="submit">Filtrar</button>
            <a href="veterinarios.php"><button type="button">Quitar filtros</button></a>
        </form>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Edad</th>            
                <th>Localidad</th>
                <th>Teléfono</th>
                <th>Correo</th>  
                <th>Acciones</th>
            </tr>

            <?php
            // Filtros dinámicos SIN consultas preparadas ni splat ni referencias
            $where = [];
            if (isset($_GET['nombre'])) {
                $nombre = ($_GET['nombre']);
                $where[] = "nombre_veterinario LIKE '%$nombre%'";
            }
            if (isset($_GET['apellidos'])) {
                $apellidos = ($_GET['apellidos']);
                $where[] = "apellidos_veterinario LIKE '%$apellidos%'";
            }
            if (isset($_GET['dni'])) {
                $dni = ($_GET['dni']);
                $where[] = "dni_veterinario LIKE '%$dni%'";
            }
            if (isset($_GET['localidad'])) {
                $localidad = ($_GET['localidad']);
                $where[] = "localidad_veterinario LIKE '%$localidad%'";
            }
            if (isset($_GET['telefono'])) {
                $telefono = ($_GET['telefono']);
                $where[] = "telefono_veterinario LIKE '%$telefono%'";
            }
            if (isset($_GET['correo'])) {
                $correo = ($_GET['correo']);
                $where[] = "correo_veterinario LIKE '%$correo%'";
            }
            $where_sql = '';
            if ($where) {
                $where_sql = "WHERE " . implode(' AND ', $where);
            }

            $sql = "SELECT * FROM veterinario $where_sql ORDER BY nombre_veterinario";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['nombre_veterinario']}</td>";
                    echo "<td>{$row['apellidos_veterinario']}</td>";
                    echo "<td>{$row['dni_veterinario']}</td>";
                    echo "<td>{$row['edad_veterinario']}</td>";
                    echo "<td>{$row['localidad_veterinario']}</td>";
                    echo "<td>{$row['telefono_veterinario']}</td>";
                    echo "<td>{$row['correo_veterinario']}</td>";
                    echo "<td>
                            <a href='../formularios/editar_usuario.php?dni_veterinario={$row['dni_veterinario']}'><button>Editar</button></a>
                            <a href='../procesos/delete/delete_veterinario.php?dni_veterinario={$row['dni_veterinario']}'><button>Eliminar</button></a>
                          </td>";
         echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay veterinarios registrados</td></tr>";
            }
            ?>
        </table>
    </section>
</main>
</body>
</html>
