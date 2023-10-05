<?php

// login the user if credentials match and populate the session with the user related info
use core\authenticator;
use core\Session;
use Http\forms\LoginForm;

$email = $_POST["email"];
$password = $_POST["password"];


// validate form inputs (email and password)
$form = new LoginForm();
$form->validate($email, $password);

    $auth = new authenticator();
    //authenticate the user
    if($auth->attempt($email, $password)){
        redirect("/");
    }

    $form->addError("email", "No matching account for that email address and password !");



// if validation fails, redirect to the login page

Session::flash("errors", $form->errors());
Session::flash("old", [
    "email" => $email
]);
redirect("/login");

//view("session/create.view.php",[
//    "errors" => $form->errors()
//]);
//

// if user not found
//if($user){
//    if (password_verify($password, $user["password"])){
//        login([
//            "email" => $email
//        ]);
//        header("location: /");
//        exit();
//    }
//
//}
//// else, the user is found, but we have to check that the submitted password is correct
//
//die();
//
