<?php

class Router {

    protected $routes = [];

    public function define($routes) {

        $this->routes = $routes;
    }

    public function redirect($uri){

        if(array_key_exists($uri, $this->routes)){
            return $this->routes[$uri];
        }

        throw new Exception('NO ROUTES');
    }
}