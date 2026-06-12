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
        <form name="ticket" method="post" action="procesa.php">
            <h2>Ticket System reservation 2.0</h2>
            <?= printResult() ?>
            <table>
                <tbody>
                <tr>
                    <td>
                        <label for="apellido">Apellido</label>
                    </td>
                    <td>
                        <input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nombre">Nombre:</label>
                    </td>
                    <td>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="documento">Documento:</label>
                    </td>
                    <td>
                        <input type="number" name="documento" id="documento" min="0" step="1" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fecha_nacimiento">Fecha nacimiento:</label>
                    </td>
                    <td>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email:</label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" required>
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
                    <button type="submit" name="finalizar" id="finalizar">Comprar ticket</button>
                    <button type="button" name="agregar" id="tramo" disabled>Agregar tramo</button>
                </fieldset>
            </div>
        </form>
    </main>
</body>
<script src="assets/js/app-ajax.js"></script>
</html>