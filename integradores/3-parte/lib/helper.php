<?php
function listarOrigins(){
    $data = [];
    $sql = " SELECT distinct c.idCiudad, c.nombreDestino
             from destinos dest
             inner join ciudades c on (dest.idOrigin = c.idCiudad)
             order by c.nombreDestino;";
    $con = new mysqli(HOST, USER, PASSWORD, DBNAME) or die();
    $result =  $con->query($sql);
    while($row = $result->fetch_object()){
        $data[$row->idCiudad] = $row;
    }
    $con->close();
    return $data;
}

function getDestinos(int $idOrigin)
{
     $data = [];
    $sql = " SELECT distinct dest.idDestino, c.nombreDestino
             from destinos dest
             inner join ciudades c on (dest.idDestino = c.idCiudad)
             where dest.idOrigin = {$idOrigin}
             order by c.nombreDestino;";
    $con = new mysqli(HOST, USER, PASSWORD, DBNAME) or die();
    $result =  $con->query($sql);
    while($row = $result->fetch_object()){
        $data[] = $row;
    }
    $con->close();
    return $data;
}

function getDatosCiudad(int $idCiudad)
{
    $sql = " SELECT c.idCiudad, c.nombreDestino
             from ciudades c
             where idCiudad = {$idCiudad}
             ;";
    $con = new mysqli(HOST, USER, PASSWORD, DBNAME) or die();
    $result = $con->query($sql);
    $con->close();
    return $result->fetch_object();
}

function makeTramo($actual, $siguiente)
{
    $origen = getDatosCiudad($actual);
    $destino = getDatosCiudad($siguiente);

    $sql = " SELECT  hora_partida, hora_llegada, duracion
             from destinos 
             where idOrigin = {$origen->idCiudad} and idDestino = {$destino->idCiudad}
             ;";
    $con = new mysqli(HOST, USER, PASSWORD, DBNAME) or die();
    $result = $con->query($sql);
    $horarios =  $result->fetch_object();
    $con->close();
    $response = new InfoTicket(
        $origen->nombreDestino,
        $destino->nombreDestino,
        $horarios->hora_partida,
        $horarios->hora_llegada,
        $horarios->duracion
    );
    return $response->toArray();
}

function getClienteByDni($dni){
    $sql = " SELECT c.idCliente, c.apellido, c.nombre, c.email, c.dni, c.fecha_nacimiento 
             from clientes c
             where dni = {$dni}
             ;";
    $con = new mysqli(HOST, USER, PASSWORD, DBNAME) or die();
    $result = $con->query($sql);
    $con->close();
    return $result->fetch_object();
}


