<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "bd_veterinaria";


$conn = mysqli_connect($server, $user, $password, $dbname);

// Verificar la conexión

if (!$conn) {
    echo "<script>alert('Conexión fallida: " . mysqli_connect_error() . "')</script>";
    die("Conexión fallida: " . mysqli_connect_error());
}
?>