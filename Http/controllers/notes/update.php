<?php


use core\App;
use core\Database;
use core\Validator;

$db = App::resolve(Database::class);
$user_id= $_SESSION["user"]["id"];
$errors = [];
//get the note
$query = "select * from note where id = :id";
$note = $db->query($query, ["id" => $_POST['id']])->findOrFail();
// check if the user is the same user as the note creator
if (!authorize($note["user_id"],$user_id)){
    abort(403);
};
#chack for form validation
if (!Validator::string($_POST["body"],1,1000)){
    $errors["body"] = "A body of no more than 1000 chars is required";
}
// if there are error render them
if(count($errors)){


    view("notes/edit.view.php", [
        "heading" =>"Edit note",
        "errors" => $errors,
        "note" => $note
    ]);
    die();
}

//otherwise update the note
$db->query("update note set body = :body where id = :id",[
    "body" => $_POST['body'],
    "id" => $_POST["id"]
]);
//redirect the user to all notes
header("location: /notes");
die();