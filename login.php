<?php
session_start();
require_once "componentes/conexion.php";

$error = "";
$email = $_COOKIE["usuario_recordado"] ?? "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($email) || empty($password)) {
        $error = "Completá todos los campos.";
    } else {
        $sql = "SELECT id, nombre, rol, password FROM usuarios WHERE email = ?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        $usuario = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt);

        if ($usuario && password_verify($password, $usuario["password"])) {
            session_regenerate_id(true);
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["rol"] = $usuario["rol"];

            if (!empty($_POST["recordar"])) {
                setcookie("usuario_recordado", $email, [
                    "expires" => time() + (15 * 24 * 60 * 60),
                    "path" => "/",
                    "httponly" => true
                ]);
            } else {
                setcookie("usuario_recordado", "", time() - 42000, "/");
            }

            $_SESSION["flash_exito"] = "Sesión iniciada correctamente.";
            header("Location: index.php");
            exit;
        } else {
            $error = "Usuario o clave incorrectos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Iniciar Sesión</title>
</head>
<body class="pag-login">
    <?php include_once 'componentes/navbar.php'; ?>
    <main>
        <h1>Iniciar sesión</h1>

        <?php

        if (($_GET["msg"] ?? "") === "sesion_cerrada") {
            echo "<p class='alerta-exito'>Sesión cerrada correctamente.</p>";
        }

        if (isset($_SESSION["flash_exito"])) {
            echo "<p class='alerta-exito'>" . htmlspecialchars($_SESSION["flash_exito"]) . "</p>";
            unset($_SESSION["flash_exito"]);
        }
        if ($error != "") {
            echo "<p class ='alerta-error'>" . htmlspecialchars($error) . "</p>";
        }
        ?>

        <form method="post" action="login.php" class="formulario">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">

            <label class="recordar">
                <input type="checkbox" name="recordar" value="1"> Recordarme en este equipo
            </label>

            <input type="submit" value="Ingresar">
        </form>
    </main>

    <?php include_once 'componentes/footer.php' ?>
    
</body>
</html>