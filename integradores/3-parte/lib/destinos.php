<?php

require_once('../lib/helper.php');
require_once('../config/conexion.php');

$destinos=[];
$destinos['data'] = getDestinos($_GET['origin']) ?? [];

header('Content-type: application/json');
echo  json_encode($destinos);