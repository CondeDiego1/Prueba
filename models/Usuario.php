<?php

namespace Model;

class Usuario {
    protected static $columnasDB = ['id','contact_no','lastname', 'createdtime'];
    protected static $db;

    function __construct(array $args = []){
        $this->id = $args['id'] ?? null;
        $this->contact_no = $args['contact_no'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->createdtime” = $args['createdtime'] ?? '';
    }
    protected static function crearObjeto($registro) {
        $objeto = new static;
        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id_usuario') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    //Reescribre el args con el array del $_POST
    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }

    public static function Listar() {
        $query = "SELECT * FROM USUARIOS";
        
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public function consultarSQL() {
        
        return $response;
    }
}