<?php
require 'includes/app.php';
incluirTemplate('header', $inicio = true);
?>


<main class="contenedor seccion">
    <h1>Mas Sobre Nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Seguridad">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab perferendis tempore ipsam dolorum
                adipisci corporis deserunt at.</p>
        </div>

        <div class="icono">
            <img src="build/img/icono2.svg" alt="Precio">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab perferendis tempore ipsam dolorum
                adipisci corporis deserunt at.</p>
        </div>

        <div class="icono">
            <img src="build/img/icono3.svg" alt="Tiempo">
            <h3>A tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab perferendis tempore ipsam dolorum
                adipisci corporis deserunt at.</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y Deptos en Venta</h2>

    <?php
    include 'includes/templates/anunciosParciales.php';
    ?>

    <div class="ver-todas alinear-derecha">
        <a href="anuncios.php" class="boton-verde">A ver todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto, y un asesor se pondra en contacto contigo a la brevedad</p>
    <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen Blog-1">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                </a>
                <p class="informacion-meta">Escrtio el <span>20/10/2023</span> por <span>Admin</span></p>
                <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando
                    dinero</p>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen Blog-2">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoracion de tu hogar</h4>
                </a>
                <p class="informacion-meta">Escrtio el <span>20/10/2023</span> por <span>Admin</span></p>
                <p>Maximiza el espacio en tu hogarcon esta guía, aprende a combinar muebles y colores para darle
                    vida a tu espacio</p>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>El personal se comporto de una excelente forma, muy buena atención y la casa que me
                ofecieron
                cumple con todas mis expectativas</blockquote>
            <p>- Facundo Dellanegra</p>
        </div>
    </section>


</div>

<?php
incluirTemplate('footer');
?>