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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavadero Artesal - Ticket</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php

    imprimoMenu();
?>
<main class="container">
    <?php
        if(count($_POST) && isset($_POST['imprimir'])):
            $encontrados = [];
            foreach ($db as $ticket){
                if($ticket->getDocumento() == $_POST['documento']){
                    $encontrados[] = $ticket;
                }
            }
            if(count($encontrados) >0 ):
                foreach ($encontrados as $ticket):
    ?>
                <article class="ticket">
                    <section>
                        <h2 style="text-align: center">Lavadero Artesanal Palazzo </h2>
                    </section>
                    <section>
                        <h4 class="row">Factura tipo: <?= $ticket->getTipo()?> - Fecha reimpresion: <?= date('d/m/Y') ?></h4>
                        <h4  class="row">
                            Forma de pago: <?= $ticket->getFormasPago()?>
                        </h4>
                    </section>
                    <section>
                        <h4>
                            <strong>Datos cliente:</strong><?= $ticket->getFullName() ?>
                            - <strong>Documento:</strong> <?=  $ticket->getDocumento()?>
                        </h4>
                    </section>
                    <section>
                        <h4><strong>Vehiculo:</strong><?= $ticket->getVehiculo() ?></h4>
                        <h4 class="row">Detalle servicio</h4>
                        <table class="details">
                            <thead>
                            <tr>
                                <td class="text-left"><strong>Servicio</strong> </td>
                                <td><strong>Costo</strong></td>
                            </tr>
                            </thead>
                            <tbody >
                                <?= $ticket->getDetalleTicket() ?>
                            </tbody>
                        </table>
                    </section>
                </article>
    <?php
                endforeach;
            else:
    ?>
                <article class="ticket">
                    <section>
                        <h2 style="text-align: center">No se encontraron tickets para el documento ingresado</h2>
                    </section>
                </article>
    <?php
            endif;
        else:
    ?>
        <form name="frm_reimprimir" method="post" action="ticket.php">
            <div class="reimprision">
                <section class="form-item">
                    <h4>Reimprimir tickets de un cliente</h4>
                </section>
                <section class="form-item">
                    <label for="documento">Documento</label>
                    <input type="number" id="documento" name="documento">
                </section>
                <section class="form-item">
                    <button type="submit" name="imprimir">Reimprimir</button>
                    <button type="reset">Reiniciar</button>
                </section>

            </div>
        </form>
    <?php
        endif;
    ?>
</main>
</body>
</html>
