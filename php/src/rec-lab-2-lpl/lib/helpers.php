<?php

function obtenerServicios(array $values): array
{
    $result = [];
    if(isset($values['lavado-chasis'])){
        $result['lavado-chasis'] = 'Lavado Chasis';
    }

    if(isset($values['lavado-motor'])){
        $result['lavado-motor'] = 'Lavado motor';
    }

    if(isset($values['interior'])){
        $result['interior'] = 'interior';
    }

    if(isset($values['completo'])){
        $result['completo'] = 'Lavado Chasis e interior';
    }

    if(isset($values['encerado'])){
        $result['encerado'] = 'Encerado';
    }

    return $result;
}

function obtenerFormasPago(array $values):array
{
    $result = [];
    if(isset($values['efectivo'])){
        $result['efectivo'] = 'efectivo';
    }

    if(isset($values['transferencia'])){
        $result['transferencia'] = 'transferencia';
    }

    if(isset($values['tarjeta'])){
        $result['tarjeta'] = 'tarjeta';
    }

    return $result;
}

function imprimoMenu()
{
    ?>
    <header class="container">
        <nav>
            <ul class="nav-bar">
                <li><a href="index.php" class="nav-item">Inicio</a></li>
                <li><a href="reportes.php" class="nav-item">Reportes</a></li>
                <li><a href="ticket.php" class="nav-item">Reimpprimir ticket</a></li>
                <li><a href="logout.php" class="nav-item">Salir</a> </li>
            </ul>
        </nav>
    </header>
    <?php
}

function isSessionActive(): bool
{
    if(isset($_SESSION['usuario'])){
        return true;
    }
    return false;
}