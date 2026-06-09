<?php

require_once "lib/Ticket.php";
require_once "lib/InfoTicket.php";
require_once('config/conexion.php');
require_once('lib/helper.php');
session_start();

$db = $_SESSION['tickets'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasajes</title>
    <link  rel="stylesheet" href="assets/css/styles.css" type="text/css" >
</head>
<body>
<main class="container">
   <div>
       <h1>Transporte Sudestada SRL</h1>
       <?php
       if(count($db) > 0):
            foreach ($db as $ticket):
       ?>
        <section class="info_ticket">
            <h4>Datos pasajero</h4>
            <div class="tikcet_header">
                <p><strong>Pasajero: </strong><?= $ticket->getFullname()?> -
                <strong>Documento: </strong><?= $ticket->getDni() ?></p>
                <p><strong>Fecha nacimiento: </strong><?= $ticket->getFechaNacimiento() ?> -
                <strong>Email: </strong><?= $ticket->getEmail() ?></p>
            </div>
            <h4>Detalle viaje</h4>
            <p><strong>Fecha salida: </strong><?= $ticket->getFecha()?></p>
            <?php
                foreach ($ticket->getDestinos() as $destino):
            ?>

            <div class="ticket_details">
                <p class="chip city"><strong>Origen: </strong><?= $destino->getOrigen() ?></p>
                <p class="chip city"><strong>Destino: </strong><?= $destino->getDestino() ?></p>
                <p class="chip time"><strong>Hora partida: </strong><?= $destino->getHoraPartida() ?></p>
                <p class="chip time"><strong>Hora llegada: </strong><?= $destino->getHoraLlegada() ?></p>
                <p class="chip duration"><strong>Duraci&oacute;n: </strong><?= $destino->getDuracion() ?> hs.</p>
            </div>
            <?php
                endforeach;
            ?>
            <div class="resume_ticket">
                <p><strong>Total paradas:</strong>
                    <?= count($ticket->getDestinos()) - 1 ?>
                </p>
            </div>
        </section>
       <?php
            endforeach;
       else:
       ?>
            <p>A&uacute;n no se han vendido tickets</p>
       <?php
       endif;
       ?>
   </div>
</main>
</body>
</html>