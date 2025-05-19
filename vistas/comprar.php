<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ./login.php");
    exit();
}

$producto = isset($_GET['producto']) ? htmlspecialchars($_GET['producto']) : 'Producto desconocido';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por tu compra</title>
    <link rel="stylesheet" href="css/comprar.css">
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 90%;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 2em;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        /* Botón de regresar */
        .btn-regresar {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .btn-regresar:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8em;
            }

            p {
                font-size: 1em;
            }

            .btn-regresar {
                font-size: 0.9em;
                padding: 8px 16px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.5em;
            }

            p {
                font-size: 0.9em;
            }

            .btn-regresar {
                font-size: 0.8em;
                padding: 6px 12px;
            }
        }



    </style>
</head>
<body>
    <div class="container">
        <h1>¡Gracias por tu compra!</h1>
        <p>Has adquirido <strong><?= $producto; ?></strong>. Esperamos que lo disfrutes y sea de gran utilidad.</p>
        <p>Si deseas seguir explorando nuestros productos, haz clic en el botón de abajo para regresar a la página principal.</p>
        <a href="./tienda.php" class="btn-regresar">Volver a la tienda</a>
    </div>
</body>
</html>

