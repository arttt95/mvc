<?php

namespace App;

class Route {

    private $routes;

    public function __construct() {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function setRoutes(array $routes) {
        $this->routes = $routes;
    }

    public function initRoutes() {

        $routes['home'] = [
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'index'
        ];

        $routes['sobre_nos'] = [
            'route' => '/sobre_nos',
            'controller' => 'IndexController',
            'action' => 'sobreNos'
        ];

        $this->setRoutes($routes);


    }

    public function run($url) {

        //echo "************" . $url . "************"; -> Verificando como o path está sendo retornado

        foreach ($this->getRoutes() as $key => $route) {

            //print_r($route);
            //echo '<br><br><br><br>'; -> Verificando se o retorno está sendo individual de cada route, precisamos testar separadamente

            if($url == $route['route']) {
                $class = "App\\Controllers\\" . $route['controller'];
                
                $controller = new $class;

                $action = $route['action'];

                $controller->$action();


            }
        }
    }

    public function getUrl() {

        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        //return parse_url('www.google.com/gmail?x=10', PHP_URL_PATH);

    }
}

?>