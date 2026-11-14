<?php
$cantidad = array_sum(array_column($_SESSION['carrito'] ?? [], 'cantidad'));
?>
<header>
<nav class="navegador">
    <a href="portada.php">Inicio</a>
    <a href="tienda.php">Tienda</a>

    <?php
    if (isset($_SESSION['nombre'])) {
        echo "<a href='logout.php'>Cerrar sesión</a>";
    } else {
        echo "<a href='login.php'>Iniciar sesión</a>";
        echo "<a href='registro.php'>Registrarse</a>";
    }
    ?>
    <a class="link-carrito" href="carrito.php">Carrito (<?php echo $cantidad; ?>)</a>
</nav>
</header>