<?php

function isSessionActive()
{
    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }
}

function getUsers()
{
    return [
        'admin' => '123456',
        'nacho' => '$123!alalalala%'
    ];
}