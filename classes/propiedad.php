<?php

namespace App;

class Propiedad
{
    // Base de datos
    protected static $db; // 1 Creo la variable que va a contener la base de datos

    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    // Definir la conexion a la BD
    public static function setDB($database) // Si la variable $db es static, el metodo tambien tiene que ser static
    {
        self::$db = $database; // 2 La variable $db (que es la creada anteriormene), se asocia con $database, y con la funcion setDB, en app.php le asignamos un valor
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function guardar()
    {
        // Sanitizar los datos 
        $atributos = $this->sanitizarAtrinutos();
        // Insertar en la base de datos
        $query = "INSERT INTO propiedades (";
        $query .= 'titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedor_id';
        $query .= ") VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= "')";

        $resultado = self::$db->query($query);

        debugear($resultado);
    }

    // Identificar y unir los atributos de la base de datos
    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtrinutos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
       
    }

}
