<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

estaAutenticado();

$propiedad = new Propiedad;

// Consulta para obtener todos los vendedores
$vendedores = Vendedor::all();

// Arreglo de errores
$errores = Propiedad::getErrores();

// Ejecuta el codigo despues de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Crea una nueva instancia 
    $propiedad = new Propiedad($_POST['propiedad']);

    /* SUBIDA DE ARCHIVOS */


    // Generar nombre unico para cada imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Setear la imagen
    // Realiza un resize a la imagen con intervention
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new ImageManager(Driver::class);
        $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen']);
        $image->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    // Validar
    $errores = $propiedad->validar();



    // Revisar que el array de errores este vacio
    if (empty($errores)) {

        // Crear la carpeta
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        // Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // Guarda en la base de datos
        $resultado = $propiedad->guardar();
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="../index.php" class=" boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>


    <form class="formulario" method="post" action="/bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">
        <?php include('../../includes/templates/formularios_propiedades.php') ?>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php
incluirTemplate('footer');
?>