<?php

require_once('../lib/helper.php');
require_once('../lib/InfoTicket.php');
require_once('../config/conexion.php');

$details = [];
$origin = (int) $_GET['origin'] ?? 0;
$destination = (int) $_GET['destination'] ?? 0;

$details['data'] = makeTramo($origin, $destination);

header('Content-type: application/json');
echo json_encode($details);
