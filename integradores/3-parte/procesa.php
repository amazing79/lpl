<?php

require_once "lib/Ticket.php";
require_once "lib/InfoTicket.php";
require_once('config/conexion.php');
require_once('lib/helper.php');
session_start();

$db = $_SESSION['tickets'] ?? [];


$salida = $_POST['fecha_salida'];
$ticket = new Ticket('jauregui', 'ignacio', '27553295   ', '14/12/1979', 'nachis@mail.com', $salida);

$actual = 'cbo_origin';
$idx = 0;
$total_destinos = $_POST['hdn_total'];

while($idx <= $total_destinos){
    $siguiente = 'destino_'.$idx;
    $tramo = makeTramo($_POST[$actual], $_POST[$siguiente]);
    $ticket->addDestino($tramo);
    $actual = $siguiente;
    $idx++;
}

$db[] = $ticket;
$_SESSION['tickets'] = $db;
$_SESSION['result'] = 'Ticket registrado correctamente!';
header('Location:index.php');