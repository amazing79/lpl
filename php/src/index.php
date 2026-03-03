<?php

require "../vendor/autoload.php";

use Amazing79\Lpl\Usuario;

$usuario = new Usuario(1, 'jauregui', 'ignacio', 27553295);

echo $usuario->getNombreCompleto();



