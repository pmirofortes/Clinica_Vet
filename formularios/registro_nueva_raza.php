<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}
include('../servicios/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de propietario</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
    <link rel="icon" href="../media/favicon.png" type="image/png">
</head>
<body>
    <header>
        <h1>Registro de Especie</h1>
    </header>
    <div class="layout">
        <section class="menu">
            <li><a href="../index.php" class="link active">Consultar mascotas</a>
            <li><a href="../formularios/registro_nueva_mascota.php" class="link">Dar de alta mascota</a>
            <li><a href="../formularios/registro_nuevo_propietario.php" class="link">Dar de alta propietario</a>
            <li><a href="../formularios/registro_nuevo_usuario.php" class="link">Dar de alta veterinario</a>
            <li><a href="../formularios/registro_nueva_especie.php" class="link">Dar de alta especie</a></li>
            <li><a href="../formularios/registro_nueva_raza.php" class="link">Dar de alta raza</a></li>
            <li><a href="../vistas/razas_especies.php" class="link">Consultar especies y razas</a></li>
            <li><a href="../vistas/propietarios.php" class="link">Consultar propietarios</a></li>
    </section>
        <section class="form">
            <form action="../procesos/create/create_raza.php" method="post">
                <label for="nombre_raza">Nombre raza:</label><br>
                <input type="text" id="nombre_raza" name="nombre_raza"><br><br>
                
                <label for="id_especie">Especie:</label><br>
                <select name="id_especie">
                    <option value="">Seleccionar especie</option>
                    <?php
                    $sql = "SELECT id_especie, nombre_especie FROM especie";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_especie'] . "'>" . $row['nombre_especie'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Error al cargar razas</option>";
                    }
                    ?>
                </select><br><br>
                <input type="hidden" name="id_raza" value="<?php echo $id_raza; ?>">
                <input type="submit" value="Registrar Especie">

            </form> 
        </section>
    </div>      
</body>
</html>