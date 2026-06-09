<?php

require_once "lib/Ticket.php";
require_once "lib/InfoTicket.php";
require_once('config/conexion.php');
require_once('lib/helper.php');
session_start();

$db = $_SESSION['tickets'] ?? [];

$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$dni = $_POST['documento'];
$fechaNacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$salida = $_POST['fecha_salida'];
$ticket = new Ticket($apellido, $nombre, $dni, $fechaNacimiento, $email, $salida);

$actual = 'cbo_origin';
$idx = 0;
$total_destinos = $_POST['hdn_total'];
if($total_destinos > 0){
    while($idx <= $total_destinos){
        $siguiente = 'destino_'.$idx;
        $tramo = makeTramo($_POST[$actual], $_POST[$siguiente]);
        $ticket->addDestino($tramo);
        $actual = $siguiente;
        $idx++;
    }
} else {
    $siguiente = 'destino_'.$idx;
    $tramo = makeTramo($_POST[$actual], $_POST[$siguiente]);
    $ticket->addDestino($tramo);
}

$db[] = $ticket;
$_SESSION['tickets'] = $db;
$_SESSION['result'] = 'Ticket registrado correctamente!';
header('Location:index.php');