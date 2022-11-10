<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\UsuarioController;

$router = new Router();

//---------------------------------- Usuarios ---------------------------------
$router->get('/', [UsuarioController::class, 'index']);
$router->post('/api/encriptar', [UsuarioController::class,'encriptar']);

//Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();