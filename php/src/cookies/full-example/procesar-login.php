<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$usuario_valido = "admin";
$password_valido = "1234";

if($usuario == $usuario_valido && $password == $password_valido){
    if(isset($_POST['recordarme'])){
        setcookie(
            "usuario",
            $usuario,
            time() + (86400 * 30),
            "/"
        );
    }
    header("Location: dashboard.php");
    exit;
}else{
    echo "Usuario o contraseña incorrectos";
}