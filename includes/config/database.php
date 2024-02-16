<?php

function conectarDB() : mysqli
{
    $db = new mysqli('localhost', 'root', 'Wmlizxc123', 'bienesraices_crud'); // new mysqli es la forma orientada a objetos, mysqli_connect es la forma con mysqli
  
   if (!$db) {
        echo 'Error no se pudo conectar';
        
    }
    return $db;
  
}
