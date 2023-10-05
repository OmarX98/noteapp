<?php

namespace core;

class Session
{
    // determine if the session has a given key
    static public function has($key){
        return (bool) static::get($key);
    }
    //put something in the session
    static public function put($key, $value){
        $_SESSION[$key]= $value;
    }

    //get something out of the session
    static public function get($key, $default = null){
        // when you get a key check if it's associated with flash flag or not
        return $_SESSION["_flash"][$key] ?? $_SESSION[$key] ?? $default;
    }

    //add value to the session flagged with 'flash'
    static public function flash($key, $value){
        $_SESSION["_flash"][$key] = $value;
    }

    //delete a flash flagged key from the session
    static public function unflash(){
        unset($_SESSION["_flash"]);
    }

    //flush the session (just empty the $_SESSION super global
    static public function flush(){
        $_SESSION = [];
    }

    //destroy the whole session and delete the browser cookie
    static public function destroy(){
        static::flush();
        session_destroy();

        //2 -> clear browser cookie
        $params = session_get_cookie_params();
        setcookie("PHPSESSID", "", time() - 3600 ,$params["path"], $params["domain"], $params["secure"], $params["httponly"]);

    }

}