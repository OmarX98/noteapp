<?php

use core\App;
use core\Validator;
use core\Database;
$name = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$pass_confirm = $_POST["password-confirmation"];

// validate form inputs
$errors = [];
if (!Validator::email($email)){
    $errors["email"] = "please provide a valid email address";
}if (!Validator::string($password,7, 225)){
    $errors["password"] = "please provide password of at least 7 characters";
}
if(!Validator::pass_confirmation($password, $pass_confirm)){
    $errors["password"] = "password confirmation mismatch, please try again !";
}

if (!empty($errors)){
    view("registration/create.view.php",[
        "errors" => $errors
    ]);
    die();
}
// create the database
$db = App::resolve(Database::class);

$query = "select * from users where email = :email";
$user = $db->query($query, ["email" => $email])->fetch();

if($user){
    header("location: /");
    exit();
}else{
    $query= "INSERT INTO users(name,email,password) VALUES(:name, :email, :password)";
    $db->query($query, [
        "name" => $name,
        "email" => $email,
        "password" =>password_hash($password, PASSWORD_BCRYPT)
    ]);

    $_SESSION["user"] = [
        "email"=> $email
    ];
    header("location: /");
    die();
}
