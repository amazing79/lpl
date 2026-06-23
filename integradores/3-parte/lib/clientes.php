<?php

require_once('../lib/helper.php');
require_once('../config/conexion.php');

$cliente = [];
$cliente['data'] = getClienteByDni($_GET['dni']) ?? [];

header('Content-type: application/json');
echo json_encode($cliente);