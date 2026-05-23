<?php

    function generarVerificador($documento, $fecha_gen): float|int
    {
        $year = substr($fecha_gen, 0, 4);
        $temp = $documento . $year;
        $verificador = 0;
        for ($i = 0; $i < strlen($temp); $i++){
            $verificador += ($i + 1) * (int) $temp[$i];
        }
        return $verificador;
    }

    function imprimoMenu()
    {
        ?>
        <header class="container">
            <nav>
                <ul class="nav-bar">
                    <li><a href="index.php" class="nav-item">Inicio</a></li>
                    <li><a href="reportes.php" class="nav-item">Reportes</a></li>
                    <li><a href="verificar.php" class="nav-item">Verficar Pasaporte</a></li>
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