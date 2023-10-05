<?php
namespace core\middleware;

class guest
{
    public function handle(){
        // if there is a user in the session then redirect to the home page (when a logged-in user visits register page for example)
        if($_SESSION['user'] ?? false){
            header("location: /");
            die();
        }
    }

}