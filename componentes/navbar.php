<nav class="navegador">
    <a href="index.php">Inicio</a>

    <?php
    if (isset($_SESSION['nombre'])) {
        echo "<span>Hola, " . htmlspecialchars($_SESSION['nombre']) . "</span>";
        echo "<a href='logout.php'>Cerrar sesión</a>";
    } else {
        echo "<a href='login.php'>Iniciar sesión</a>";
        echo "<a href='registro.php'>Registrarse</a>";
    }
    ?>
</nav>