<?php

require "../vendor/autoload.php";

use Amazing79\Lpl\Usuario;

$usuario = new Usuario(1, 'jauregui', 'ignacio', 27553295, new DateTime("1979-12-14"));

echo $usuario->getNombreCompleto();

echo "<br>";

echo $usuario->getFechaNacimientoPantalla();

echo "<br>";



