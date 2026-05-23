<?php
session_start();
require_once('lib/helper.php');

$db = getUsers();

if(count($_POST) > 0){
    $user = $_POST['usuario'];
    $pass = $_POST['password'];
    if(isset($db[$user]) && $db[$user] == $pass){
        $_SESSION['user'] = 'Miguel';
    } else {
        $_SESSION['message'] = 'Usuario no valido!';
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<?php
if(isset($_SESSION['user'])){
    ?>
    <div class="dashboard">

        <header>
            <h1>Panel Principal</h1>
            <a href="test1.php" class="logout" id="test1">Test 1</a>
            <a href="test2.php" class="logout" id="test2">Test 2</a>
            <a href="logout.php" class="logout" id="logout">Cerrar Sesión</a>
        </header>

        <main>
            <div class="box">
                <h3>Bienvenido Usuario</h3>
                <p>Zona privada del sistema.</p>
            </div>

            <div class="box">
                <h3>Configuración</h3>
                <p>Opciones del sistema.</p>
            </div>
        </main>

    </div>
<?php

} else {
?>
<main class="contenedor">
    <form class="card" id="frm_login" method="post" action="login.php">
        <h2>Iniciar Sesión</h2>
        <?php

        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
            echo "<p>".$message."</p>";
        }
        ?>

        <input type="text" placeholder="Usuario o Email" name="usuario" id="usuario" required>
        <input type="password" placeholder="Contraseña" name="password" id="password" required>

        <button type="submit">Ingresar</button>

        <p>No tienes cuenta?</p>
        <a href="registro.html">Registrarse</a>
    </form>
</main>
<?php
    //cierro el else
}
?>
</body>
<script src="assets/js/app.js"></script>
</html>