<?php
//start a session
use core\Session;

session_start();
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "core/functions.php";
//// autoload a class when required
require BASE_PATH . "vendor/autoload.php";
//spl_autoload_register(function ($class){
//    $class = str_replace("\\",DIRECTORY_SEPARATOR, $class);
//    require (base_path($class . ".php"));
//});
require base_path('bootstrap.php');
$router = new \core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->get('/', 'controllers/index.php');

$router->route($uri, $method);

// unset the temporary data
Session::unflash();

//dd($_SERVER);
//
//$config = require ("config.php");
//$db = new Database($config);
//$id = $_GET['id'];
//$query = "select * from post where id = ?";
//$posts = $db->query($query, [$id])->fetch();
//foreach ($posts as $post){
//    echo("<li>".$post . "</li>");
//    echo("<li>".$post."</li>");
//}
//