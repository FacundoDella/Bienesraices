<?php

// Conexion a la base de datos
    // Incluye el Header
require 'includes/app.php';
$db = conectarDB();

$errores = [];

// Autenticar el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    //var_dump($email);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (!$email) {
        $errores[] = 'El email es obligatorio o no es valido';
    }


    if (!$password) {
        $errores[] = 'El password es obligatorio';
    }


    if (empty($errores)) {

        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);
        //var_dump($resultado);

        if ($resultado->num_rows) {
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);


            // Verificar si el password es correcto o no
            $auth = password_verify($password, $usuario['password']);
            // var_dump($auth);
            if ($auth) {
                //El usuario esta autenticado
                session_start();
                // Llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('location: /bienesraices/admin/index.php');
            } else {
                $errores[] = 'El password es incorrecto';
            }
        } else {
            $errores[] = 'El usuario no existe';
        }
    }
}



incluirTemplate('header');
?>


<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <?php
    foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Email y Password</legend>
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu Email" id="email">

            <label for="password">Pasword</label>
            <input type="password" name="password" placeholder="Tu Password" id="password">
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde contenido-centrado">
    </form>
</main>

<?php
incluirTemplate('footer');
?>