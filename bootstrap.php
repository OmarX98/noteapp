<?php

use core\App;
use core\Container;
use core\Database;
//create a new container for the database and add a resolver to it (an instantiation function)
$container = new Container();

$container->bind("core\Database", function (){
    $config = require base_path("config.php");
    return new Database($config);

});
App::setContainer($container);
