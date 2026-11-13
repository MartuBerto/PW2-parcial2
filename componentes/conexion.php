<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host    = "localhost";
$usuario = "root";
$clave   = "";
$base    = "tienda_videojuegos";

try {
    $conexion = new mysqli($host, $usuario, $clave, $base);
    $conexion->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("No se pudo conectar a la base de datos.");
} 
?>