<?php
session_start();
require_once "../componentes/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/portada.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">
    <title>Bienvenido a Tienda Geek</title>
</head>
<body class="pag-portada">

    <?php include_once '../componentes/navbar.php'; ?>

    <main>
        <h1 class="centrado">TIENDA GEEK</h1>

        <section class="centrado">
            <p>El mejor lugar para encontrar consolas, videojuegos y lanzamientos de última generación.</p>
            <p>En Tienda Geek sabemos que cada partida es única. Por eso, te acercamos el catálogo más completo para PlayStation, Xbox, Nintendo y PC. Ya sea que prefieras la acción, explorar mundos abiertos o revivir los clásicos de siempre, acá vas a encontrar todo lo necesario para tu próxima aventura. Descubrí tu próximo juego favorito.</p>
            <p class="alerta-error"> VE A LA TIENDA A TRAVÉS DE LA BARRA DE NAVEGACIÓN</p>
            <div>
                <figure>
                        <a href="tienda.php"><img src="../img/coleccion-discos.jpg" alt=""></a>
                </figure>
            </div>
        </section>
    </main>

    <?php include_once '../componentes/footer.php'; ?>
    
</body>
</html>
