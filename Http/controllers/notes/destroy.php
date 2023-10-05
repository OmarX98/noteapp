<?php

use core\App;
//use core\Database;

//$config = require base_path("config.php");
//$db = new Database($config);
$db = App::resolve("core\Database");

$user_id= $_SESSION["user"]["id"];
//delete a note

$query = "select * from note where id = :id";
$note = $db->query($query, ["id" => $_POST['id']])->findOrFail();

if (!authorize($note["user_id"],$user_id)){
    abort(403);
}

$db->query("delete from note where id = :id", [
    "id"=> $_POST["id"]
]);
header("location: /notes");
exit();

