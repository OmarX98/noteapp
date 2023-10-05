<?php
namespace core\middleware;

class auth
{
    public function handle(){
        // only authenticated users
        if(!$_SESSION['user'] ?? false){
            header("location: /");
            die();
        }
    }
}