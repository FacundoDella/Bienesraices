<?php

require '../../includes/app.php';

use App\Propiedad;

estaAutenticado();


// Base de Datos
$db = conectarDB();

// Consultar para obtener los vendedores 
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo de errores
$errores = [];

$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = "";

// Ejecuta el codigo despues de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad = new Propiedad($_POST);
    $propiedad->guardar();
   
    // Nunca confies en tus usuarios
    // Este codigo mysqli_real_escape_string

    // $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    // $precio = mysqli_real_escape_string($db, $_POST['precio']);
    // $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    // $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    // $wc = mysqli_real_escape_string($db, $_POST['wc']);
    // $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    // $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    // $creado = date('Y/m/d');

    
    // Asignar files a una variable
    $imagen = $_FILES['imagen'];


    if (!$titulo) {
        $errores[] = 'Debes añadir un título';
    }

    if (!$precio) {
        $errores[] = 'El precio es obligatorio';
    }

    if (strlen($descripcion) < 50) {
        $errores[] = 'La descripcion es obligatoria y debe tener al menos 50 caracteres';
    }

    if (!$habitaciones) {
        $errores[] = 'El numero de habitaciones es obligatorio';
    }

    if (!$wc) {
        $errores[] = 'El numero de baños es obligatorios ';
    }

    if (!$estacionamiento) {
        $errores[] = 'El numero de lugares de estacionamiento es obligatorio';
    }

    if (!$vendedorId) {
        $errores[] = 'Debes elegir un vendedor';
    }

    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = 'Debes añadir una imagen';
    }

    // Validar la imagen por tamaño ( 100kb maximo)
    $medida = 1000 * 1000;

    if ($imagen['size'] > $medida) {
        $errores[] = 'La imagen es muy pesada';
    }

    // Revisar que el array de errores este vacio
    if (empty($errores)) {

        /* SUBIDA DE ARCHIVOS */

        // Crear la carpeta
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        // Generar nombre unico para cada imagen

        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        // Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        // Insertar en la base de datos
        // $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedor_id) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";

        // echo $query;
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            // Redireccionar al usuario
            header('location: /bienesraices/admin/index.php?resultado=1');

            // La redireccion va antes de todo el codigo Html y se usa poco
        }
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
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" cols="30" rows="10"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedorId">
                <option value="">--Elegir Vendedor--</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '';  ?> value="<?php echo $vendedor['id'] ?>"> <?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php
incluirTemplate('footer');
?>