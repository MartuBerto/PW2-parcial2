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
        </section>
        <section class="beneficios">
            <div class="beneficio">
                <h3>Envíos a todo el país</h3>
                <p>Recibí tus pedidos en la puerta de tu casa.</p>
            </div>
            <div class="beneficio">
                 <h3>Cuotas sin interés</h3>
                <p>Pagá en cuotas con las tarjetas seleccionadas.</p>
            </div>
            <div class="beneficio">
                 <h3>Productos originales</h3>
                <p>Todo con garantía oficial.</p>
            </div>
        </section>
            
            <p class="alerta-error"> INGRESA A LA TIENDA A TRAVÉS DE LA BARRA DE NAVEGACIÓN</p>
        
    </main>

    <?php include_once '../componentes/footer.php'; ?>
    
</body>
</html>
