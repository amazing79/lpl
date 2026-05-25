<?php
session_start();
require_once('lib/helpers.php');

if(isset($_POST['btn_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == 'admin@gmail.com' && $password == 'admin'){
        $_SESSION['usuario'] = 'admin';
    } else {
        unset($_SESSION['usuario']);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavado Artesanal</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php
    if(isset($_SESSION['usuario'])):
        imprimoMenu();

?>
    <main class="container">
        <form action="procesa.php" name="frm_ticket" id="frm_ticket" method="post">

            <h2 style="text-align: center">Lavadero Artesanal Palazzo</h2>
            <?php
                if(isset($_SESSION['result'])){
                    $message = $_SESSION['result'];
                    unset($_SESSION['result']);
                    echo '<h4 style="text-align: center">'.$message .'</h4>';
                }
            ?>
            <table class="details">
                <tr>
                    <td>Apellido:</td>
                    <td>
                        <input type="text" name="apellido" id="apellido" required>
                    </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" id="nombre" required></td>
                </tr>
                <tr>
                    <td>Documento:</td>
                    <td>
                        <input type="number" name="documento" id="documento" required>
                    </td>
                </tr>
                <tr>
                    <td>email:</td>
                    <td>
                        <input type="email" name="email" id="email" required>
                    </td>
                </tr>
                <tr>
                    <td>tipo Factura</td>
                    <td>
                        <input type="radio" value="A" name="tipo" id="tipo-a">A
                        <input type="radio" value="B" name="tipo" id="tipo-b">B
                    </td>
                </tr>
                <tr>
                    <td>Tipo vehiculo:</td>
                    <td>
                        <select name="vehiculo" id="vehiculo">
                            <option value="moto">Moto</option>
                            <option value="auto">Auto</option>
                            <option value="camioneta">Camioneta</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Servicios:</td>
                    <td>
                        <section class="form-item">
                            <label for="lavado-chasis">lavado chasis</label>
                            <input type="checkbox" name="lavado-chasis" id="lavado-chasis" value="1">
                        </section>
                        <section class="form-item">
                            <label for="lavado-motor">lavado motor</label>
                            <input type="checkbox" name="lavado-motor" id="lavado-motor" value="2">
                        </section>
                        <section class="form-item">
                            <label for="interior">Interior</label>
                            <input type="checkbox" name="interior" id="interior" value="3">
                        </section>
                        <section class="form-item">
                            <label for="completo">lavado chasis e Interior</label>
                            <input type="checkbox" name="completo" id="completo" value="4">
                        </section>
                        <section class="form-item">
                            <label for="encerado">Encerado</label>
                            <input type="checkbox" name="encerado" id="encerado" value="5">
                        </section>
                    </td>
                </tr>
                <tr>
                    <td>Forma de pago:</td>
                    <td>
                         <span>
                            <label for="efectivo">Efectivo</label>
                            <input type="checkbox" name="efectivo" id="efectivo" value="efectivo">
                         </span>
                        <span>
                            <label for="transferencia">Transferencia</label>
                            <input type="checkbox" name="transferencia" id="transferencia" value="transferencia">
                        </span>
                        <span>
                            <label for="tarjeta">Tarjeta</label>
                            <input type="checkbox" name="tarjeta" id="tarjeta" value="tarjeta">
                        </span>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit">Generar Ticket</button></td>
                    <td><button type="reset">Reiniciar</button></td>
                </tr>
            </table>
        </form>
    </main>
<?php
    else:

?>
    <div class="container">
        <h2 class="result">Ticket System Web</h2>
        <form name="login" action="index.php" method="post">
            <table class="login-box">
                <tr>
                    <td>Usuario:</td>
                    <td><input type="email" name="username" placeholder="Ingrese mail.." /> </td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td><input type="password" name="password" placeholder="Ingrese su password.." /> </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="btn_login">Ingresar</button>
                    </td>
                    <td>
                        <button type="reset" name="btn_reset" >Reset</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
<?php
    endif;
?>
</body>
</html>