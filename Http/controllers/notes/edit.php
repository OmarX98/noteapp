<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$user_id= $_SESSION["user"]["id"];

//get the note
$query = "select * from note where id = :id";
$note = $db->query($query, ["id" => $_GET['id']])->findOrFail();
// check if the user is the same user as the note creator
if (!authorize($note["user_id"],$user_id)){
    abort(403);
};

view("notes/edit.view.php", [
    "heading" =>"Edit note",
    "errors" => [],
    "note" => $note
]);

