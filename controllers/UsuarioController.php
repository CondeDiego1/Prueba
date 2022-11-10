<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class UsuarioController {
    public static function index(Router $router){
        $router->view();
    }

    public static function encriptar () {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $claveAcceso = $_ENV['ACCESO'];
            $clave = md5($_POST['token'].$claveAcceso);
            echo json_encode($clave);
        }
    }
}