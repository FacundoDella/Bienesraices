<?php

require 'includes/app.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">

    <h2>Casas y Deptos en Venta</h2>

    <?php
    $limite = 10;
    include 'includes/templates/anunciosParciales.php';
    ?>

</main>

<?php
incluirTemplate('footer');
?>