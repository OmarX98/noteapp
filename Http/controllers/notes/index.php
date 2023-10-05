<?php

use core\App;

$db = App::resolve("core\Database");
$user_id= $_SESSION["user"]["id"];
$query = "select * from note where user_id = :user_id";
$notes = $db->query($query, ["user_id" => $user_id])->get();

view("notes/notes.view.php",[
    "heading" => "your notes",
    "notes" => $notes,
    ]);

//