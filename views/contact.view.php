<?php require "partials/header.php" ?>
<?php require "partials/nav.php" ?>
<div style="text-align: center">
    <h1>Hello, <?=  $_SESSION["user"]["email"]  ?? "Guest" ?></h1>

    <h4>welcome to <?=  $heading; ?> page</h4>

</div>
<?php require "partials/footer.php" ?>
