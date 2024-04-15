<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


require '../../includes/app.php';

estaAutenticado();

// Validar la URL por ID válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
    header('location: /bienesraices/admin/index.php');
}


// Consulta para las propiedades  
$propiedad = Propiedad::find($id);

// Consulta para obtener todos los vendedores
$vendedores = Vendedor::all();

// Arreglo de errores
$errores = Propiedad::getErrores(); // Array de errores vacio



// Ejecuta el codigo despues de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Asignar los atributos nuevos enviados  a travez de $_POST
    $args = $_POST['propiedad'];
    $propiedad->sincronizar($args);

    // Validacion
    $errores = $propiedad->validar();

    // Generar nombre unico para cada imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    // Subida de archivos
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new ImageManager(Driver::class);
        $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen']);
        $image->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    // Revisar que el array de errores este vacio
    if (empty($errores)) {
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            // Almacenar la imagen 
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        }
        $propiedad->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <a href="../index.php" class=" boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>


    <form class="formulario" method="post" enctype="multipart/form-data">
        <?php require '../../includes/templates/formularios_propiedades.php' ?>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>

</main>

<?php
incluirTemplate('footer');
?>