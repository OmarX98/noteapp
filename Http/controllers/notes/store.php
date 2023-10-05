<?php

use core\App;
use core\Database;
use core\Validator;
$db = App::resolve(Database::class);
$errors = [];
if (!Validator::string($_POST["body"],1,1000)){
    $errors["body"] = "A body of no more than 1000 chars is required";
}
if(!empty($errors)){
    view("notes/note-create.view.php", [
        "heading" =>"create new note",
        "errors" => $errors
    ]);

}
if (empty($errors)){
    $query = "INSERT INTO note(body,user_id) VALUES(:body, :user_id)";

    $db->query($query,["body" => $_POST["body"], "user_id" => $_SESSION["user"]["id"]
    ]);

    header("location: /notes");
    die();

}


//