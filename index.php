<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include_once '.componentes/navbar.php' ?>

<main>
    <?php
    include_once 'componentes/conexion.php';

    $resultado = mysqli_query($conexion, "SELECT * FROM productos");

    while ($producto = mysqli_fetch_assoc($resultado)) {
        echo "<div class='producto'>";
        echo "<img src='" . htmlspecialchars($producto['imagen']) . "' width='200'>";
        echo "<h3>" . htmlspecialchars($producto['nombre']) . "</h3>";
        echo "<p>Plataforma: " . htmlspecialchars($producto['plataforma']) . "</p>";
        echo "<p>Precio: $" . htmlspecialchars($producto['precio']) . "</p>";

        if ($producto['stock'] == 0) {
            echo "<p>Sin stock</p>";
        }

        echo "</div>";
    }
    ?>
</main>

<?php include_once '.componentes/footer.php' ?>
    
</body>
</html>