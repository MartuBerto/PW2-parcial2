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
                echo "<h3>" . htmlspecialchars($linea['nombre']) . "</h3>";
                echo "<p>Precio: $" . htmlspecialchars($linea['precio']) . "</p>";
                echo "<p>Cantidad: " . $linea['cantidad'] . "</p>";
                echo "<p>Subtotal: $" . $subtotal . "</p>";
                echo "<form method='post' action='carrito.php'>";
                echo "<input type='hidden' name='quitar' value='" . $id . "'>";
                echo "<input type='submit' value='Quitar'>";
                echo "</form>";
                echo "</div>";
            }

        echo "</div>";

        echo "<p class='centrado'>Total: $" . $total . "</p>";

        echo "<form method='post' action='carrito.php' class='centrado'>";
        echo "<input type='hidden' name='vaciar' value='1'>";
        echo "<input type='submit' value='Vaciar carrito'>";
        echo "</form>";
    }
    ?>






    </main>
    
</body>
</html>