<?php

require_once('../lib/helper.php');
require_once('../config/conexion.php');

$destinos=[];
$origin = $_POST['origin'] ?? $_GET['origin'];
$destinos['data'] = getDestinos($origin) ?? [];

header('Content-type: application/json');
echo  json_encode($destinos);