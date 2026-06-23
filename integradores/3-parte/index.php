<?php
require_once('config/conexion.php');
require_once('lib/helper.php');
session_start();
$partidas = listarOrigins();

function printResult(){
    $message = '';
    if(isset($_SESSION['result'])){
        $message = '<h4>' . $_SESSION['result'] . '</h4>';
        unset($_SESSION['result']);
    }
    return $message;
}
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
        <h1>Transporte Sudestada SRL</h1>
        <section>
            <h2>Ticket System reservation 2.0</h2>
            <h3>Ingrese el documento del cliente que quiere reservar el pasaje</h3>
            <table>
                <tbody>
                <tr>
                    <td>
                        <label for="documento">Ingrese Documento:</label>
                    </td>
                    <td>
                        <input type="number" name="documento" id="documento" min="0" step="1" required>
                        <button id="search" name="search">Buscar</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <?= printResult() ?>
            <h3>Datos del cliente</h3>
            <table class="cliente">
                <tr>
                    <td>
                        <label for="apellido">Apellido</label>
                    </td>
                    <td>
                        <span id="apellido"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nombre">Nombre:</label>
                    </td>
                    <td>
                        <span id="nombre"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fecha_nacimiento">Fecha nacimiento:</label>
                    </td>
                    <td>
                        <span id="fecha_nacimiento"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email:</label>
                    </td>
                    <td>
                        <span id="email"></span>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="panel" id="panel">
                <fieldset>
                    <label for="fecha_salida">Fecha viaje</label>
                    <input type="date" name="fecha_salida" id="fecha_salida" required>
                </fieldset>
                <fieldset>
                    <label for="origin">Origen</label>
                    <select name="cbo_origin" id="origin">
                        <option value="0">Seleccione Origen</option>
                        <?php foreach($partidas as $partida): ?>
                            <option value="<?= $partida->idCiudad ?>"><?= $partida->nombreDestino ?></option>
                        <?php endforeach; ?>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="destino_0">Destino/parada</label>
                    <select name="destino_0" id="destino_0">
                        <option value="0">Seleccione destino</option>
                    </select>
                </fieldset>
                <input type="hidden" name="hdn_total" id="hdn_total" value="0">
            </div>
            <div>
                <fieldset class="button_container">
                    <button type="button" name="details" id="details">Mostrar detalle</button>
                    <!--
                    <button type="button" name="agregar" id="tramo" disabled>Agregar tramo</button>
                    -->
                </fieldset>
            </div>
        </section>
    </main>
    <footer class="container">
        <section class="hide info_ticket" id="display_details">
            <h4>Detalle viaje</h4>
            <div class="ticket_details">
                <p class="chip city"><strong>Origen: </strong> <span id="city_origin"></span></p>
                <p class="chip city"><strong>Destino: </strong> <span id="city_destination"></span></p>
                <p class="chip time"><strong>Hora partida: </strong><span id="hora_salida"></span></p>
                <p class="chip time"><strong>Hora llegada: </strong><span id="hora_llegad"></span></p>
                <p class="chip duration"><strong>Duraci&oacute;n: </strong><span id="duracion"></span> hs.</p>
            </div>
        </section>
    </footer>
</body>
<script src="assets/js/app-ajax.js"></script>
</html>