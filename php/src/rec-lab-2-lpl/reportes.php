<?php
require_once('class/Ticket.php');
require_once('lib/helpers.php');
session_start();

if(!isSessionActive()) {
    header('location: index.php');
}

$db = $_SESSION['db'] ?? [];

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
        <?php
            foreach ($db as $ticket):
        ?>
            <section class="reporte">
                <p>
                    <strong>Cliente:</strong> <?= $ticket->getFullName() ?>
                    - <strong>Documento:</strong> <?= $ticket->getDocumento() ?>
                    - <strong>Email:</strong> <?= $ticket->getEmail() ?>
                </p>
                <p>
                    <strong>Factura tipo:</strong> <?= $ticket->getTipo() ?>
                    - <strong>Vehiculo:</strong> <?= $ticket->getVehiculo() ?>
                    - <strong>Formas de pago seleccionadas:</strong> <?= $ticket->getFormasPago() ?></p>
                <p>Servicios realizados:</p>
                <table> <?= $ticket->getDetalleTicket() ?></table>
            </section>

        <?php
            endforeach;
        ?>

        <?php
            endif;;
        ?>
    </main>
</body>
</html>
