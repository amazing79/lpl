<?php
    session_start();
    require_once("lib/helpers.php");

    if(isset($_POST['btn_login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == 'admin@gmail.com' && $password == '#idAmin3278'){
            $_SESSION['usuario'] = 'admin';
        } else {
            unset($_SESSION['usuario']);
        }
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

<?php
    if(isSessionActive()):
        imprimoMenu();
?>
    <main class="container">
        <?php
            if(isset($_SESSION['result'])):
                $message = $_SESSION['result'];
                unset($_SESSION['result']);
                echo "<h4 class='result'>{$message}</h4>";
            endif;
        ?>
        <form action="procesa.php" id="frm_process" method="post">
            <h1>Formulario generador de pasaporte</h1>
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
                        <label for="genero">Genero</label>
                    </td>
                    <td>
                        <select name="genero" id="genero">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="indefinido">indefinido</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="country">Pais:</label>
                    </td>
                    <td>
                        <select name="paises" id="country">
                            <option value="argentina">Argentina</option>
                            <option value="brasil">Brasil</option>
                            <option value="chile">Chile</option>
                            <option value="colombia">Colombia</option>
                            <option value="peru">Peru</option>
                            <option value="uruguay">uruguay</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="renueva">Renueva:</label></td>
                    <td>
                        <input type="checkbox" name="renueva" id="renueva">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="bnt__panel">
                        <button type="submit">Generar</button>
                        <button type="reset">Resetear</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </main>

<?php
        else:
?>
    <div class="container">
        <h2 class="result">Passport System Web</h2>
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
    <script src="assets/js/app.js"></script>
</html>