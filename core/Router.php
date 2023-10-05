<?php
namespace core;
use core\middleware\auth;
use core\middleware\guest;
use core\middleware\middleware;

class Router{
    // list of routes that will be stored at the beginning when starting the website
    public $routes = [];

    // adds a route with its properties
    public function add($method, $uri, $controller){
        $this->routes[] = [
            "uri" =>$uri,
            "controller" =>$controller,
            "method" => $method,
            "middleware" => NULL,
        ];
        return $this;
    }
    // the following 5 functions binds a specified method and controller to the given route
    public function get($uri, $controller){
        return $this->add("GET", $uri, $controller);
    }
    public function post($uri, $controller){
        return $this->add("POST", $uri, $controller);
    }
    public function delete($uri, $controller){
        return $this->add("DELETE", $uri, $controller);
    }
    public function patch($uri, $controller){
        return $this->add("PATCH", $uri, $controller);
    }
    public function put($uri, $controller){
        return $this->add("PUT", $uri, $controller);
    }

    // routes the requested with its method
    public function route($uri, $method){
        // go through each route and check if the requested routes exists or not and
        // if it exists and has the same HTTP method as requested => return it, otherwise render the error page
        foreach ($this->routes as $route) {
            if($route["uri"] === $uri && $route["method"] === strtoupper($method)){
                //apply middleware(if there is any) to check the user is authenticated to access this route or not
                if ($route["middleware"]){
                    middleware::resolve($route["middleware"]);
                }
                return require base_path("Http/controllers/".$route['controller']);
            }

        }
        $this->abort();
    }
    // binds middleware to a given route
    public function only($key){
        $this->routes[array_key_last($this->routes)]["middleware"] =$key;
        return $this->routes;
    }

    // kill the execution and reutrn the 404 page
    protected function abort($code = 404) {
        http_response_code($code);

        view("{$code}.php");

        die();

    }}

//$routes = require base_path("routes.php");
//$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//
//function routeToController($uri, $routes) {
//    if (array_key_exists($uri, $routes)) {
//        require base_path($routes[$uri]);
//    } else {
//        abort(404);
//    }
//}
//
//function abort($code = 404) {
//    http_response_code($code);
//
//    view("{$code}.php");
//
//    die();
//}
//
//routeToController($uri, $routes);