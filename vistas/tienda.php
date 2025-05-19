<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ./login.php");
    exit();
}

$xmlFile = '../xml/inventario.xml';
if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    if (!$xml) {
        die('Error: El archivo XML no se pudo cargar correctamente.');
    }
} else {
    die('Error: No se pudo encontrar el archivo XML en la ruta especificada.');
}

$filtroCaracteristica = isset($_GET['caracteristica']) ? htmlspecialchars($_GET['caracteristica']) : '';
$filtroTipo = isset($_GET['tipo']) ? htmlspecialchars($_GET['tipo']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Veterinaria</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f9f9f9 60%, #e0f7fa 100%);
            color: #333;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            background: linear-gradient(90deg, #4CAF50 60%, #45a049 100%);
            color: white;
            padding: 32px 0 24px 0;
            margin: 0 0 24px 0;
            letter-spacing: 2px;
            font-size: 2.5em;
            box-shadow: 0 2px 12px rgba(76,175,80,0.08);
            border-bottom-left-radius: 32px;
            border-bottom-right-radius: 32px;
        }

        /* Productos */
        .productos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 32px 10px;
            gap: 32px;
        }

        .producto {
            background: linear-gradient(135deg, #fff 80%, #e0f7fa 100%);
            border: 1.5px solid #b2dfdb;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(76,175,80,0.08), 0 1.5px 6px rgba(0,0,0,0.04);
            width: 320px;
            padding: 24px 18px 18px 18px;
            text-align: center;
            transition: transform 0.25s, box-shadow 0.25s;
            position: relative;
            overflow: hidden;
        }

        .producto::before {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 80px;
            height: 80px;
            background: rgba(76,175,80,0.07);
            border-radius: 50%;
            /* z-index: 0; */
        }

        .producto:hover {
            transform: translateY(-10px) scale(1.025);
            box-shadow: 0 8px 32px rgba(76,175,80,0.16), 0 2px 12px rgba(0,0,0,0.08);
        }

        .producto h2 {
            font-size: 1.6em;
            color: #4CAF50;
            margin-bottom: 12px;
            letter-spacing: 1px;
            font-weight: 600;
            /* z-index: 1; */
            position: relative;
        }

        .producto p {
            margin: 12px 0;
            font-size: 1.08em;
            line-height: 1.6;
            /* z-index: 1; */
            position: relative;
        }

        .caracteristica {
            display: inline-block;
            background: linear-gradient(90deg, #e0f7fa 60%, #b2dfdb 100%);
            color: #00796b;
            padding: 6px 14px;
            margin: 6px 3px;
            border-radius: 8px;
            font-size: 0.97em;
            font-weight: 500;
            box-shadow: 0 1px 4px rgba(0,121,107,0.06);
        }

        /* Mejorar visualización de imágenes */
        .producto-img {
            width: 100%;
            height: 350px; /* Aumenta la altura de las imágenes */
            border-radius: 12px;
            margin-bottom: 14px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(76,175,80,0.07);
            border: 1.5px solid #e0f7fa;
            background: #e0f7fa;
            transition: transform 0.2s;
        }
        .producto-img:hover {
            transform: scale(1.03);
        }

        /* Botón de Comprar */
        .btn-comprar {
            display: inline-block;
            background: linear-gradient(90deg, #4CAF50 70%, #45a049 100%);
            color: white;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 7px;
            font-size: 1.08em;
            margin-top: 16px;
            transition: background 0.3s, box-shadow 0.2s;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(76,175,80,0.08);
            border: none;
            cursor: pointer;
        }

        .btn-comprar:hover {
            background: linear-gradient(90deg, #45a049 70%, #388e3c 100%);
            box-shadow: 0 4px 16px rgba(76,175,80,0.16);
        }

        /* Estilo del formulario de filtrado */
        .filtro-form {
            text-align: center;
            margin: 32px 0 18px 0;
            background: #e0f7fa;
            padding: 18px 0;
            border-radius: 12px;
            box-shadow: 0 1px 6px rgba(0,121,107,0.06);
        }

        .filtro-form label {
            font-size: 1.18em;
            margin-right: 12px;
            color: #00796b;
            font-weight: 500;
        }

        .filtro-form select {
            padding: 7px 16px;
            font-size: 1.05em;
            border: 1.5px solid #b2dfdb;
            border-radius: 7px;
            background: #fff;
            color: #00796b;
            transition: border 0.2s;
        }

        .filtro-form select:focus {
            border: 1.5px solid #4CAF50;
            outline: none;
        }

        /* Botón genérico */
        .btn {
            padding: 7px 18px;
            font-size: 1.05em;
            background: linear-gradient(90deg, #4CAF50 70%, #45a049 100%);
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.2s;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(76,175,80,0.08);
        }

        .btn:hover {
            background: linear-gradient(90deg, #45a049 70%, #388e3c 100%);
            box-shadow: 0 4px 16px rgba(76,175,80,0.16);
        }

        /* Responsive Design */
        @media (max-width: 900px) {
            .productos {
                gap: 18px;
            }
            .producto {
                width: 95%;
                max-width: 400px;
            }
        }

        @media (max-width: 768px) {
            .productos {
                flex-direction: column;
                align-items: center;
                padding: 18px 2vw;
            }
            .producto {
                width: 98%;
                max-width: 420px;
                padding: 18px 8px 12px 8px;
            }
            h1 {
                font-size: 2em;
                padding: 24px 0 16px 0;
                border-bottom-left-radius: 18px;
                border-bottom-right-radius: 18px;
            }
            .filtro-form {
                margin: 18px 0 12px 0;
                padding: 12px 0;
            }
        }


    </style>


</head>
<body>
    <nav class="menu" id="menu">
        <div class="contenido_menu">
            <img src="../media/cross.svg" alt="No se ha podido cargar la imagen" class="imagen_cruz" onclick="cerrarmenu()">

            <li><a href="./consultas.php" class="link active">Consultas</a>
            <li><a href="./dar_de_alta.php" class="link">Dar de alta</a>
            <li><a href="./actualizar.php" class="link">Actualizar</a>
            <li><a href="./tienda.php" class="link">Tienda</a>
                
        </div>

        
    </nav>
    
    <div class="boton_abrir_menu" id="boton">
        <img src="../media/menu.svg" alt="No se ha podido cargar la imagen" onclick="abrirmenu()">
    </div>
    
    <main id="layout">
    <h1>TIENDA VETERINARIA</h1>

    <form method="GET" class="filtro-form">
        <label for="tipo">Filtrar por tipo:</label>
        <select name="tipo" id="tipo">
            <option value="">Todos</option>
            <option value="alimento" <?= $filtroTipo == 'alimento' ? 'selected' : '' ?>>Alimento</option>
            <option value="juguete" <?= $filtroTipo == 'juguete' ? 'selected' : '' ?>>Juguete</option>
        </select>

        <label for="caracteristica">Filtrar por característica:</label>
        <select name="caracteristica" id="caracteristica">
            <option value="">Todas</option>
            <option value="perro" <?= $filtroCaracteristica == 'perro' ? 'selected' : '' ?>>Perro</option>
            <option value="gato" <?= $filtroCaracteristica == 'gato' ? 'selected' : '' ?>>Gato</option>
            <option value="seco" <?= $filtroCaracteristica == 'seco' ? 'selected' : '' ?>>Seco</option>
            <option value="húmedo" <?= $filtroCaracteristica == 'húmedo' ? 'selected' : '' ?>>Húmedo</option>
            <option value="adulto" <?= $filtroCaracteristica == 'adulto' ? 'selected' : '' ?>>Adulto</option>
            <option value="snack" <?= $filtroCaracteristica == 'snack' ? 'selected' : '' ?>>Snack</option>
        </select>

        <button type="submit" class="btn">Filtrar</button>
        <a href="tienda.php" class="btn">Limpiar filtros</a>
    </form>

    <div class="productos">
        <?php if ($xml && $xml->producto): ?>
            <?php foreach ($xml->producto as $producto): ?>
                <?php
                // Verificar si el producto coincide con los filtros
                $mostrarProducto = true;

                // Filtrar por tipo
                if ($filtroTipo && $producto['tipo'] != $filtroTipo) {
                    $mostrarProducto = false;
                }

                // Filtrar por característica
                if ($mostrarProducto && $filtroCaracteristica) {
                    $mostrarProducto = false;
                    foreach ($producto->caracteristicas->categoria as $categoria) {
                        if ($categoria == $filtroCaracteristica) {
                            $mostrarProducto = true;
                            break;
                        }
                    }
                }
                ?>
                <?php if ($mostrarProducto): ?>
                    <div class="producto">
                        <img src="../media/inv/<?= htmlspecialchars($producto->nombre); ?>.jpg" alt="<?= htmlspecialchars($producto->nombre); ?>" class="producto-img">
                        <h2><?= htmlspecialchars($producto->nombre); ?></h2>
                        <p><strong>Precio:</strong> €<?= htmlspecialchars($producto->precio); ?></p>
                        <p><strong>Descripción:</strong> <?= htmlspecialchars($producto->descripcion); ?></p>
                        <p><strong>Características:</strong>
                            <?php foreach ($producto->caracteristicas->categoria as $categoria): ?>
                                <span class="caracteristica"><?= htmlspecialchars($categoria); ?></span>
                            <?php endforeach; ?>
                        </p>
                        <a href="comprar.php?producto=<?= urlencode($producto->nombre); ?>" class="btn-comprar">Comprar</a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles en la tienda.</p>
        <?php endif; ?>
    </div>
    </main>
</body>
</html>

