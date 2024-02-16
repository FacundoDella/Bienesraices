<?php

define('TEMPLATE_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');


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
