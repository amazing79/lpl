<?php

$usuario_recordado = "";

if(isset($_COOKIE['usuario'])){
    $usuario_recordado = $_COOKIE['usuario'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>login</title>
</head>

<body>

<div class="login-box">
    <h2>Iniciar sesión</h2>
    <form method="POST" action="procesar-login.php">
        <input type="text" name="usuario" placeholder="Usuario" value="<?php echo $usuario_recordado; ?>" required>
        <input type="password" name="password" placeholder="Contraseña"required>
        <?php if(empty($usuario_recordado)) : ?>
            <div class="remember">
            <label>
                <input type="checkbox" name="recordarme">
                Recordarme
            </label>
            </div>
        <?php endif ?>
        <button type="submit">Ingresar</button>
    </form>
</div>
</body>
</html>