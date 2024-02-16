<?php
// importa el id desde la url ( que esta enlazada desde anunciosParciales.php en ver anuncios ), y se lo asigna  la variable $id
$id = $_GET['id'];
// Luego lo filtra para asegurarse de que sea un entero (INT)
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('location: /bienesraices/index.php');
}

// Importar la base de datos
require 'includes/app.php';
$db = conectarDB();
// Consultar 
$query = "SELECT * FROM propiedades WHERE id = $id";
// Obtener los resultados 
$resultado = mysqli_query($db, $query);
// Lo que hace es enlasar una variable con un assoc hacia el resultado, es decir que crea una variable para ver el aobjeto de $resultado
// echo '<pre>';
// var_dump($resultado->num_rows);
// echo '</pre>';

if (!$resultado->num_rows) {
    header('location: /bienesraices/index.php');
}

$propiedad = mysqli_fetch_assoc($resultado);


incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad['titulo']; ?></h1>

    <picture>
        <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la Propiedad">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio"><?php echo $propiedad['precio']; ?></p>

        <ul class="iconos-caracteristicas iconos-reducido">
            <li>
                <img src="build/img/icono_wc.svg" alt="icono wc">
                <p><?php echo $propiedad['wc']; ?></p>
            </li>

            <li>
                <img src="build/img/icono_estacionamiento.svg" alt="estacionamiento">
                <p><?php echo $propiedad['estacionamiento']; ?></p>
            </li>

            <li>
                <img src="build/img/icono_dormitorio.svg" alt="dormitorio">
                <p><?php echo $propiedad['habitaciones']; ?></p>
            </li>
        </ul>

        <p><?php echo $propiedad['descripcion']; ?></p>
    </div>
</main>

<?php
mysqli_close($db);

incluirTemplate('footer');

?>