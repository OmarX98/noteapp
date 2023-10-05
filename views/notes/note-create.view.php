<?php view( "partials/header.php") ?>
<?php view("partials/nav.php") ?>
<h1>Create new note</h1>
<form method="post" action="/notes/create">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Note body</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body" ><?= $_POST["body"] ?? "" ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="submit">
    <h3 style="color: red"> <?php if(isset($errors["body"])): ?>
            <?= $errors["body"] ?>
        <?php endif ?>
    </h3>
</form>
<?php view("partials/footer.php") ?>
