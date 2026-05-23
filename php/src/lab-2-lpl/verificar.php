<?php
    session_start();
    require_once("lib/helpers.php");

    $db = $_SESSION['db'] ?? [];

    if(!isSessionActive()){
        header("location: index.php");
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Generador de Pasaporte</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php imprimoMenu(); ?>

<?php
if(count($db) > 0):
    if(count($_POST) > 0 && isset($_POST['btn_verificar'])):
        $dni = $_POST['documento'];
        $fecha = $_POST['fecha_gen'];
        $codigo = $_POST['codigo'];
        $generado = generarVerificador($dni, $fecha);
        $message = $codigo == $generado ? 'El pasaporte ingresado es valido' : 'El pasaporte ingresado no es valido. Verifica los datos ingresados';

    ?>
        <main class="container">
            <h4 class="result"><?= $message ?></h4>
            <div style="text-align: center">
                <a href="verificar.php" class="nav-item">Volver</a>
            </div>
        </main>
    <?php
    else:
    ?>
    <main class="container">
        <form name="verificar" action="verificar.php" method="post">
            <table>
                <tr>
                    <td>
                        <label for="documento">Documento</label>
                    </td>
                    <td>
                       <input type="number" name="documento" id="documento" placeholder="ingrese dni..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fecha_gen">Fecha Alta</label>
                    </td>
                    <td>
                        <input type="date" name="fecha_gen" id="fecha_gen" placeholder="ingrese fecha..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="codigo">Codigo Verificador</label>
                    </td>
                    <td>
                        <input type="number" name="codigo" id="codigo" placeholder="ingrese codigo verificador..." required>
                    </td>
                </tr>
            </table>
            <br />
            <div class="bnt__panel">
                <button type="submit" name="btn_verificar">Verificar</button>
                <button type="reset">Reiniciar</button>
            </div>
        </form>
    </main>
    <?php
        //verificar passporte
        endif;
    ?>
<?php
// no hay cargado passaportes
else:
    ?>
    <div class="container">
        <h2 class="result">Aún no se ha generado pasaportes!</h2>
    </div>
<?php
endif;
?>
</body>
<script src="assets/js/app.js"></script>
</html>
