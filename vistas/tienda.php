<?php
$xmlFile = '../xml/inventario.xml';
if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    if (!$xml) {
        die('Error: El archivo XML no se pudo cargar correctamente.');
    }
} else {
    die('Error: No se pudo encontrar el archivo XML en la ruta especificada.');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Veterinaria</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/animal.jpg">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 20px 0;
            margin: 0;
        }

        /* Productos */
        .productos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
            gap: 20px;
        }

        .producto {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 15px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .producto:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .producto h2 {
            font-size: 1.5em;
            color: #4CAF50;
            margin-bottom: 10px;
        }

        .producto p {
            margin: 10px 0;
            font-size: 1em;
            line-height: 1.5;
        }

        .caracteristica {
            display: inline-block;
            background-color: #e0f7fa;
            color: #00796b;
            padding: 5px 10px;
            margin: 5px 2px;
            border-radius: 5px;
            font-size: 0.9em;
        }

        /* Nueva clase para imágenes */
        .producto-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
            object-fit: cover;
        }

        /* Botón de Comprar */
        .btn-comprar {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn-comprar:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .productos {
                flex-direction: column;
                align-items: center;
            }

            .producto {
                width: 90%;
            }
        }
    </style>
        
</head>
<body>

    <h1>Tienda Veterinaria</h1>
    <div class="productos">
        <?php if ($xml && $xml->producto): ?>
            <?php foreach ($xml->producto as $producto): ?>
                <div class="producto">
                    <img src="../media/<?= htmlspecialchars($producto->nombre); ?>.jpg" alt="<?= htmlspecialchars($producto->nombre); ?>" class="producto-img">
                    <h2><?= htmlspecialchars($producto->nombre); ?> (<?= htmlspecialchars($producto['tipo']); ?>)</h2>
                    <p><strong>Precio:</strong> €<?= htmlspecialchars($producto->precio); ?></p>
                    <p><strong>Descripción:</strong> <?= htmlspecialchars($producto->descripcion); ?></p>
                    <p><strong>Características:</strong>
                        <?php foreach ($producto->caracteristicas->categoria as $categoria): ?>
                            <span class="caracteristica"><?= htmlspecialchars($categoria); ?></span>
                        <?php endforeach; ?>
                    </p>
                    <a href="./compra.php?producto=<?= urlencode($producto->nombre); ?>" class="btn-comprar">Comprar</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles en la tienda.</p>
        <?php endif; ?>
    </div>

</body>
</html>

