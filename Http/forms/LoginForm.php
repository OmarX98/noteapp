<?php

namespace Http\forms;

use core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password){
        if (!Validator::email($email)){
            $this->errors["email"] = "please provide a valid email address";
        }if (!Validator::string($password)){
            $this->errors["password"] = "please provide a password";
        }

        return empty($this->errors);

    }
    public function errors(){
        return $this->errors;
    }

    public function addError($field, $mssg){
        $this->errors[$field] = $mssg;
    }
}