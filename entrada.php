<?php

require 'includes/app.php';
incluirTemplate('header');
?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al Bosque</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="webp">
            <source srcset="build/img/destacada2.jpg" type="jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la Propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/7/2023</span> por <span>Admin</span></p>

        <div class="resumen-propiedad">

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque distinctio sint placeat, repudiandae
                alias quas dolorum nesciunt pariatur, doloremque reprehenderit nihil expedita illo, modi cum suscipit
                hic tenetur at eligendi.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque distinctio sint placeat, repudiandae
                alias quas dolorum nesciunt pariatur, doloremque reprehenderit nihil expedita illo, modi cum suscipit
                hic tenetur at eligendi.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque distinctio sint placeat, repudiandae
                alias quas dolorum nesciunt pariatur, doloremque reprehenderit nihil expedita illo, modi cum suscipit
                hic tenetur at eligendi.</p>
        </div>
    </main>

    <?php
incluirTemplate('footer');
?>