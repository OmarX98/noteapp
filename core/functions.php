<?php

use core\Session;

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
function urlIs($value){
    return $_SERVER["REQUEST_URI"] === $value;
}
function authorize($note_id,$user_id){
    return $note_id === $user_id;

}
function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attr = []){
    extract($attr);
    require base_path("views/".$path); // this will load the view ==> /views/view_name.php
}
function abort($code = 404) {
    http_response_code($code);

    view("{$code}.php");

    die();
}
function redirect($path){
    header("location: {$path}");
    exit();

}
function logout()
{
    //log the user out
    //destroy the session
    Session::destroy();
}
//get the old form data
function old($key, $default = ""){
    return Session::get("old")[$key] ?? $default;
}
