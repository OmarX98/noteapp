<?php
namespace core;

class Validator{
    public static function string($value, $min =1 , $max= INF){
        $value= trim($value);
        return strlen($value)>=$min && strlen($value) <= $max;
    }
    public static function email($value){
        //filter var checks for a particular format
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    public static function pass_confirmation($password, $confirmation){
        return $password === $confirmation;
    }
}