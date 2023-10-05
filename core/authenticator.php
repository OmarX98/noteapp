<?php

namespace core;

class authenticator
{
    // attempt to log in the user
    public function attempt($email, $password){
        $user = App::resolve(Database::class)->query("select * from users where email = :email", ["email" => $email])->fetch();

    if($user){
        if (password_verify($password, $user["password"])){
            $this->login($user);
            // if authentication passes
            return true;
            }

        }
        return false;
    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            "id" => $user["id"]
        ];
        // regenerate the session id and delete the old session id file
        session_regenerate_id(true);
    }


}