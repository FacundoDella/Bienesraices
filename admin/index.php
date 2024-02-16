<?php

require '../includes/funciones.php';
$auth = estaAutenticado();
if (!$auth) {
    header('Location: /bienesraices/index.php');
}

// Iportar la conexion
require '../includes/config/database.php';
$db = conectarDB();
// Escribir el Query
$query = "SELECT * FROM propiedades";

// Conultar la BD
$resultadoConsulta = mysqli_query($db, $query);

// Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id-casa'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        // Eliminar el archivo 
        $queryImagen = "SELECT imagen FROM propiedades WHERE id = $id";
        $resultadoImagen = mysqli_query($db, $queryImagen);
        $propiedad = mysqli_fetch_assoc($resultadoImagen);
        unlink('../imagenes/' . $propiedad['imagen']);

        // Eliminar la propiedad de la pagina
        $query = "DELETE  FROM propiedades WHERE id = $id";
        $resultadoDelete = mysqli_query($db, $query);

        if ($resultadoDelete) {
            header('location: /bienesraices/admin/index.php?resultado=3');
        }
    }
}


//Incluye un Template
incluirTemplate('header');
?>


<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php
    if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Anuncio Actualizado Correctamente</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta exito">Anuncio Eliminado Correctamente</p>
    <?php endif; ?>

    <a href="./propiedades/crear.php" class=" boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>

        </thead>

        <tbody> <!-- .Motrar los Resultados -->
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) :
            ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id-casa" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a class="boton-amarillo-block" href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php
// Cerrar la conexion
mysqli_close($db);
incluirTemplate('footer');
?>