<?php

use core\App;

$db = App::resolve("core\Database");
$user_id= $_SESSION["user"]["id"];
//delete a note

$query = "select * from note where id = :id";
$note = $db->query($query, ["id" => $_GET['id']])->findOrFail();

if (!authorize($note["user_id"],$user_id)){
    abort(403);
};
view("notes/note.view.php", [
    "note" => $note,
    "heading" => "Note page"]);



//