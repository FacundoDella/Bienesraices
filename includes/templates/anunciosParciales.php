<?php

use App\Propiedad;



if ($_SERVER["SCRIPT_NAME"] === "/bienesraices/anuncios.php") {
    $propiedades = Propiedad::all();
} else {
    $propiedades = Propiedad::get(3);
}
?>

<div class="contenedor-card">
    <?php foreach ($propiedades as $propiedad) {
    ?>
        <div class="card">

            <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio">

            <div class="contenido-card">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio"><?php echo $propiedad->precio; ?></p>
            </div>

            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>

                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>

                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="dormitorio">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>

            <a href="anuncio.php?id=<?php echo $propiedad->id; ?> " class="boton boton-amarillo-block">
                Ver Propiedad
            </a>
        </div><!--card-->
    <?php } ?>
</div>