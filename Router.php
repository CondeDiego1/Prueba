<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas() {
        if (isset($_SERVER['PATH_INFO'])) {
            $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        } else {
            $currentUrl = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        }

        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ( $fn ) {
            //call_user_func va a llamar una función cuando no sabemos cual será
            call_user_func($fn, $this); // This es para pasar argumentos
        }
    }

    public function view() {
        include_once __DIR__ . '/views/index.php';
    }
}
