<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class UsuarioController {
    //Muestra la vista inicial al cargar la página
    public static function index(Router $router){
        $router->view();
    }

    //Método de api para obtener la clave encriptada
    public static function encriptar () {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $claveAcceso = $_ENV['ACCESO'];
            $clave = md5($_POST['token'].$claveAcceso);
            echo json_encode($clave);
        }
    }
}