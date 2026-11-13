<?php
session_start();
include_once 'componentes/conexion.php';

$ordenes = [
        "nombre" => "nombre ASC",
        "menor_precio" => "precio ASC",
        "mayor_precio" => "precio DESC",
        
    ];

    if (isset($_POST['orden']) && isset($ordenes[$_POST['orden']])) {
        $orden = $_POST['orden'];
        setcookie("orden", $orden, time() + 60 * 60 * 24 * 30, "/");
        } elseif (isset($_COOKIE['orden']) && isset($ordenes[$_COOKIE['orden']])) {
            $orden = $_COOKIE['orden'];
        } else {
            $orden = "nombre";
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Tienda</title>
</head>
<body>

<?php include_once 'componentes/navbar.php' ?>

<main>
<h1>TIENDA GEEK</h1>
<p class="centrado">Venta de consolas y videojuegos</p>
<?php
if (isset($_SESSION["nombre"])) {
    echo "<p>Bienvenido/a, " . htmlspecialchars($_SESSION["nombre"]) . "</p>";

    if (isset($_SESSION["flash_exito"])) {
        echo "<p>" . htmlspecialchars($_SESSION["flash_exito"]) . "</p>";
        unset($_SESSION["flash_exito"]);
    }
}
?>
    <div class="centrado">
        <form method="post" action="index.php">
            <label for="orden">Ordenar por:</label>
        <select name="orden" id="orden">
            <option value="" disabled selected>Seleccione un orden</option>
            <option value="nombre">Nombre</option>
            <option value="menor_precio">Precio: menor a mayor</option>
            <option value="mayor_precio">Precio: mayor a menor</option>
        </select>
            <input type="submit" value="Ordenar">
        </form>
    </div>
    <?php

    if ($orden === "menor_precio") {
        $sql = "SELECT * FROM productos ORDER BY precio ASC";
    } elseif ($orden === "mayor_precio") {
        $sql = "SELECT * FROM productos ORDER BY precio DESC";
    } else {
        $sql = "SELECT * FROM productos ORDER BY nombre ASC";
    }

      $resultado = mysqli_query($conexion, $sql);

      echo "<div class= 'caja-productos'>";

    while ($producto = mysqli_fetch_assoc($resultado)) {
        echo "<div class='producto'>";
        echo "<img src='" . htmlspecialchars($producto['imagen']) . "' alt='" . htmlspecialchars($producto['nombre']) . "'>";
        echo "<h3>" . htmlspecialchars($producto['nombre']) . "</h3>";
        echo "<p>Plataforma: " . htmlspecialchars($producto['plataforma']) . "</p>";
        echo "<p>Precio: $" . htmlspecialchars($producto['precio']) . "</p>";

        if ($producto['stock'] == 0) {
            echo "<p>Sin stock</p>";
        }

        echo "</div>";
    }

    echo "</div>";

    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>
</main> 

<?php include_once 'componentes/footer.php' ?>
    
</body>
</html>