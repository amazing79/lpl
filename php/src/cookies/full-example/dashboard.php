<?php
    $mensaje = "";
    if(!isset($_COOKIE['visita'])){
        $mensaje = "Bienvenido por primera vez";
        setcookie(
            "visita",
            "1",
            time() + (86400 * 30),
            "/"
        );
    }else{
        $mensaje = "Bienvenido de nuevo, Ya te extrañabamos!";
    }
    $usuario = "";
    if(isset($_COOKIE['usuario'])){
        $usuario = $_COOKIE['usuario'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>dashboard</title>
</head>

<body>

<div class="login-box">
    <div class="message">
    <h3><?php echo $mensaje; ?></h3>

    <?php
        if($usuario){
            echo "<p>Hola <b>$usuario</b></p>";
        } else {
            echo "<p>Hola <b>usuario que no quiere que lo recuerden</b></p>";
        }
    ?>
    </div>
    <a class="logout" href="logout.php">Cerrar sesión</a>
</div>
</body>
</html>