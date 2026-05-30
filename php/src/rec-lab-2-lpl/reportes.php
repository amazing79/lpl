<?php
require_once('class/Ticket.php');
require_once('lib/helpers.php');
session_start();

if(!isSessionActive()) {
    header('location: index.php');
}

$db = $_SESSION['db'] ?? [];

$vecTotales=[];
$vecTotalesServicios=[];
$totalFacturado = 0;
$vecTotales['moto'] = 0;
$vecTotales['auto'] = 0;
$vecTotales['camioneta'] = 0;

$vecTotalesServicios['lavado-chasis'] = 0;
$vecTotalesServicios['lavado-motor'] = 0;
$vecTotalesServicios['interior'] = 0;
$vecTotalesServicios['completo'] = 0;
$vecTotalesServicios['encerado'] = 0;

foreach ($db as $ticket){
    if(isset($vecTotales[$ticket->getVehiculo()])){
        $vecTotales[$ticket->getVehiculo()]++;
    }
    $totalFacturado += $ticket->getTotalTicket();
    foreach ($ticket->getServicios() as $key => $value){
        if(isset($vecTotalesServicios[$key])){
            $vecTotalesServicios[$key]++;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavado Artesanal</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php
    imprimoMenu();
?>
    <main class="container">
        <?php
            if(count($db) == 0):
        ?>
            <h1>Aún no se han registrados operaciones!</h1>
        <?php else:?>
            <h4>Total de operaciones registradas : <?= count($db) ?> </h4>

            <section class="reporte">
               <h4>Resumen de vehiculos atendidos</h4>
                <ul>
                    <li>Total de motos: <?= $vecTotales['moto'] ?> </li>
                    <li>Total de autos:  <?= $vecTotales['auto'] ?></li>
                    <li>Total de camionetas: <?= $vecTotales['camioneta'] ?></li>
                </ul>
                <h4>Resumen de servicios realizados</h4>
                <ul>
                    <li>Lavado chasis: <?= $vecTotalesServicios['lavado-chasis'] ?> </li>
                    <li>Lavado de motor:  <?= $vecTotalesServicios['lavado-motor'] ?></li>
                    <li>Interior: <?= $vecTotalesServicios['interior'] ?></li>
                    <li>Completo: <?= $vecTotalesServicios['completo'] ?></li>
                    <li>Encerado: <?= $vecTotalesServicios['encerado'] ?></li>
                </ul>
                <h4>Total de ganancias registradas: $<?= $totalFacturado ?></h4>
            </section>

        <?php
            endif;;
        ?>
    </main>
</body>
</html>
