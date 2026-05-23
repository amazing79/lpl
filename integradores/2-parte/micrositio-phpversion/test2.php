<?php
session_start();
require_once ('lib/helper.php');

isSessionActive();
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

    <div class="dashboard">

        <header>
            <h1>Panel Principal</h1>
            <a href="test1.php" class="logout" id="test1">Test 1</a>
            <a href="test2.php" class="logout" id="test2">Test 2</a>
            <a href="logout.php" class="logout" id="logout">Cerrar Sesión</a>
        </header>

        <main>
            <div class="box">
                <h3>Test 2</h3>
                <p>Zona privada del sistema.</p>
            </div>

            <div class="box">
                <h3>Configuración</h3>
                <p>Opciones del sistema.</p>
            </div>
        </main>

    </div>
</body>
<script src="assets/js/app.js"></script>
</html>
