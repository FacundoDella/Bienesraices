<?php

require 'includes/app.php';
incluirTemplate('header');
?>


    <main class="contenedor seccion nosotros">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="nosotros-contenido">
            <div class="nosotros-imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="webp">
                    <source srcset="build/img/blog3.jpg" type="jpeg">
                    <img src="build/img/blog3.jpg" alt="Imagen Sobre Nosotros">
                </picture>
            </div>
            <div class="nosotros-texto">
                <p> <span>25 Años de Experiencia</span>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et veritatis ad assumenda quisquam nihil,
                    eum
                    officiis nulla est saepe ratione expedita velit illo eos sit, quas alias odit provident voluptatum.
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto iste hic, voluptas sed aliquam
                    obcaecati excepturi, blanditiis accusamus enim voluptatibus quo culpa veniam suscipit, iure vero
                    expedita sit nostrum nesciunt.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic dolores cumque modi sit architecto
                    ullam
                    quo quisquam, similique nihil explicabo odit harum facere tempore doloremque sunt illo in id
                    tempora.
                </p>

            </div>
        </div>
    </main>

    <section class="contenedor seccion">
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
    </section>

    <?php
incluirTemplate('footer');
?>