<?php view("partials/header.php") ?>
<?php view("partials/nav.php") ?>
<div style="text-align: center">
    <h1>Hello, <?=  $_SESSION["user"]["email"] ?? "Guest" ?></h1>

    <h4>welcome to <?=  $heading; ?> page</h4>

</div>
<?php view("partials/footer.php") ?>
