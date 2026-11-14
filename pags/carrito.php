<?php
session_start();


    if (isset($_POST['vaciar'])) {
        unset($_SESSION['carrito']);
        header("Location: carrito.php");
        exit;
    }

    if (isset($_POST['quitar'])) {
        unset($_SESSION['carrito'][(int)$_POST['quitar']]);
        header("Location: carrito.php");
        exit;
    }


$carrito = $_SESSION['carrito'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/carrito.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">
    <title>Carrito</title>
</head>
<body>
    <main>
        <h1>Carrito</h1>
      
        <?php
            if (empty($carrito)) {
                echo "<p class='centrado'>El carrito está vacío.</p>";
            } else {
                echo "<div class='lista-carrito'>";

            foreach ($carrito as $id => $linea) {
                $subtotal = $linea['precio'] * $linea['cantidad'];
                $total += $subtotal;

                echo "<div class='linea-carrito'>";
                echo "<img src='../" . htmlspecialchars($linea['imagen']) . "' alt='" . htmlspecialchars($linea['nombre']) . "'>";
                echo "<h3>" . htmlspecialchars($linea['nombre']) . "</h3>";
                echo "<p>Precio: $" . htmlspecialchars($linea['precio']) . "</p>";
                echo "<p>Cantidad: " . $linea['cantidad'] . "</p>";
                echo "<p>Subtotal: $" . $subtotal . "</p>";
                echo "<form method='post' action='carrito.php'>";
                echo "<input type='hidden' name='quitar' value='" . $id . "'>";
                echo "<input type='submit' value='Quitar' class ='boton-volver'>";
                echo "</form>";
                echo "</div>";
            }

        echo "</div>";

        echo "<p class='centrado'>Total: $" . $total . "</p>";

        echo "<form method='post' action='carrito.php' class='centrado'>";
        echo "<input type='hidden' name='vaciar' value='1'>";
        echo "<input type='submit' value='Vaciar carrito' id='vaciar'>";
        echo "</form>";
    }
    ?>

    <a class="boton-volver" href="tienda.php">← Volver a la tienda</a>

    </main>

    <?php include_once '../componentes/footer.php' ?>
    
</body>
</html>