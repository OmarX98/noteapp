<?php view( "partials/header.php") ?>
<?php view("partials/nav.php") ?>
<h1><?= $heading; ?></h1>
<form method="post" action="/note" >
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Note body</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body" ><?= $note["body"]; ?></textarea>
    </div>
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?= $note["id"];?>">
    <input type="submit" class="btn btn-primary" value="Save">
    <a href="/notes">
        <button type="button" class="btn btn-secondary">
            Cancel
        </button>
    </a>
</form>

<h3 style="color: red"> <?php if(isset($errors["body"])): ?>
        <?= $errors["body"] ?>
    <?php endif ?>
</h3>

<?php view("partials/footer.php") ?>
