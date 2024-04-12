<?php

define('TEMPLATE_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');


function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATE_URL . "/{$nombre}.php";
}


function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /bienesraices/index.php');
    }
}

function debugear($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

// Escapar/Sanitizar el HTML

function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}
