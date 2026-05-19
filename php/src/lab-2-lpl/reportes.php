<?php
    session_start();
    require_once("lib/helpers.php");

    if(!isSessionActive()){
        header("location: index.php");
    }

    $db = $_SESSION['db'] ?? [];

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
<?php imprimoMenu();

if(count($db) > 0):
    ?>
    <main class="container">
        <h4 class="result">Total de passaportes generados: <?= count($db) ?></h4>
       <?php foreach ($db as $passport): ?>
            <p><strong>Apellido y nombre:</strong> <?= $passport['apellido']?>, <?= $passport['nombre']?> </p>
            <p><strong>Documento:</strong><?= $passport['documento']?> - <strong>Fecha Nacimiento:</strong> <?= $passport['fecha_nac']?> </p>
            <p><strong>Pais:</strong> <?= $passport['pais']?> - <strong>Genero:</strong> <?= $passport['genero']?> </p>
            <p><strong>Fecha alta:</strong> <?= $passport['fecha_gen']?> - <strong>Codigo Verificador:</strong> <?= $passport['verificador'] ?? 0?> </p>
            <p>Renueva? : <?= $passport['renueva'] ? 'Si': 'No' ?> </p>
            <hr />
        <?php endforeach; ?>
        <div class="result" style="margin-top: 20px;">
            <a href="index.php" class="nav-item">Volver</a>
        </div>
    </main>
<?php
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