<nav class="navegador">
    <a href="index.php">Inicio</a>

    <?php if (isset($_SESSION['nombre'])) { ?>
        <a href="logout.php">Cerrar sesión</a>
    <?php } else { ?>
        <a href="login.php">Iniciar sesión</a>
        <a href="registro.php">Registrarse</a>
    <?php } ?>
</nav>