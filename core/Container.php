<?php

namespace core;
// class for building a container for services
// every container have a resolver function which initialize that service
class Container
{
    protected $bindings = [];
    public function bind($key, $resolver){
        $this->bindings[$key] = $resolver;
    }
    public function resolve($key){
        if(!array_key_exists($key, $this->bindings)){
            throw new \Exception("NO matching binding for {$key}");
        }
        if(array_key_exists($key, $this->bindings)){
            $resolver = $this->bindings[$key];
            return call_user_func($resolver);
        }
    }
}