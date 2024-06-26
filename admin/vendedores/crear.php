<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;


// Arreglo de errores
$errores = Vendedor::getErrores();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Crea una nueva instancia de vendedor
    $vendedor = new Vendedor($_POST['vendedor']);

    // Validar que no haya campos vacios
    $errores =  $vendedor->validar();

    // No hay errores
    if (empty($errores)) {
        $vendedor->guardar();
    }
}


if (empty($errores)) {
}



incluirTemplate('header');

?>


<main class="contenedor seccion">
    <h1>Registrar Vendedor(a)</h1>

    <a href="../index.php" class=" boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>


    <form class="formulario" method="post" action="/bienesraices/admin/vendedores/crear.php">
        <?php include('../../includes/templates/formularios_vendedores.php') ?>
        <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">
    </form>

</main>

<?php
incluirTemplate('footer');
?>