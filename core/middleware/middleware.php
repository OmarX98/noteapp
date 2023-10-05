<?php

namespace core\middleware;

class middleware
{
    public const MAP = [
        'guest' => guest::class,
        'auth' => auth::class,
    ];
    public static function resolve($key){
        // if no key, just return
        if(!$key){
            return;
        }
        // this will return the class of the middleware associated with the route
        // if there is no middleware associated with that key then set $middleware to false
        $middleware = static::MAP[$key] ?? false;
        if(!$middleware){
            throw new \Exception("This middleware '{$key}' does not exists !!!");
        }

        // instantiate the middleware class & call the handle method
        (new $middleware)->handle();

    }
}