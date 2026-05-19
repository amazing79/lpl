<?php
session_start();

require_once("lib/helpers.php");

if(isSessionActive()){
    $db = $_SESSION['db'] ?? array();

    $data = array();
    $fechaGen = date("Y-m-d");
    $data['apellido'] = $_POST['apellido'];
    $data['nombre'] = $_POST['nombre'];
    $data['documento'] = $_POST['documento'];
    $data['fecha_nac'] = $_POST['fecha_nacimiento'];
    $data['fecha_gen'] = $fechaGen;
    $data['genero'] = $_POST['genero'];
    $data['pais'] = $_POST['paises'];
    $data['renueva'] = $_POST['renueva'] ?? false;
    $data['verificador'] = generarVerificador($_POST['documento'], $fechaGen);

    $db[] = $data;

    $_SESSION['db'] = $db;
    $_SESSION['result'] = 'Pasaporte Generado con Exito!';
}

header('Location: index.php');