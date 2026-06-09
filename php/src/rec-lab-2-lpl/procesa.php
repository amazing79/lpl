<?php

use class\Ticket;

require_once('class/Ticket.php');
require_once('lib/helpers.php');
session_start();

$db = $_SESSION['db'] ?? [];

$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : 'no ingresado';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'no ingresado';
$documento = isset($_POST['documento']) ? $_POST['documento'] : 0;
$email = isset($_POST['email']) ? $_POST['email'] : 'email@noingresado.com';
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 'A';
$vehiculo = isset($_POST['vehiculo']) ? $_POST['vehiculo'] : 'no ingresado';
$servicios = obtenerServicios($_POST);
$pagos = obtenerFormasPago($_POST);

$newTicket = new Ticket($apellido, $nombre, $documento, $email, $tipo, $vehiculo, $servicios, $pagos);

$db[] = $newTicket;
$_SESSION['db'] = $db;
$_SESSION['result'] = 'Ticket registrado con exito';

header('location: index.php');