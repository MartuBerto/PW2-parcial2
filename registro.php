<?php
session_start();
require_once "componentes/conexion.php";

$error = "";
$nombre = "";
$apellido = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($nombre) || empty($email) || empty($password)) {
        $error = "Completá todos los campos.";
    } else {
     
        $sql = "SELECT id FROM usuarios WHERE email = ?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultado) > 0) {
            $error = "Ese email ya está registrado.";
            mysqli_stmt_close($stmt);
        } else {
            mysqli_stmt_close($stmt);

          
            $rol = "cliente";
            $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $nombre, $email, $password, $rol);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            $_SESSION["flash_exito"] = "Cuenta creada. Ya podés iniciar sesión.";
            header("Location: login.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Registro</title>
</head>
<body>
    <?php include_once 'componentes/navbar.php' ?>
    <main>
    <h1>Registrarse</h1>

<?php if ($error != "") { ?>
    <p><?php echo htmlspecialchars($error); ?></p>
<?php } ?>

<form method="post" action="registro.php">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" value="<?php echo htmlspecialchars($apellido); ?>">

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="Registrarme">
</form>
</main>
</body>
</html>