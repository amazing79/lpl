<?php
$value = 'Valor de prueba';

// Establecer una "cookie de sesión" que caduca cuando se cierra el navegador
//setcookie("TestCookie", $value);
// Establecer una cookie que expira en 1 hora
//setcookie("TestCookie", $value, time()+3600);
// Establecer una cookie que se aplique solo a una ruta específica en un dominio específico.
// Tenga en cuenta que el dominio utilizado debe coincidir con el dominio del sitio.
// setcookie("TestCookie", $value, time()+3600, "/", "", false, false);
// Para borrar una cookie, debemos setear su fecha de creacion a una fecha anterior
setcookie("TestCookie", $value, time() - 3600, );

if (isset($_COOKIE['TestCookie'])) {
    echo 'Habemus dato <br />';
    echo $_COOKIE['TestCookie'] . '<br />';
    echo print_r($_COOKIE);
    echo '<br />';
} else {
    echo 'La cookie no es visible hasta que recargemos la pagina. Sabelo!';
}
// array de cookies
setcookie("cookie[three]", "cookiethree");
setcookie("cookie[two]", "cookietwo");
setcookie("cookie[one]", "cookieone");
// Después del recargado de la página, las mostramos
if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name : $value <br />";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies con php</title>
    <script src="cookies.js"></script>
</head>
<body>
    
</body>
</html>