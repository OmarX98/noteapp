<?php  view("partials/header.php") ?>
<?php  view("partials/nav.php") ?>
<h1>welcome to note of id <?= $_GET["id"]?> page</h1>

<?php view("/partials/footer.php") ?>
<main>


                <h4>
                    <?= htmlspecialchars($note["body"]) ?>
                </h4>
    <br>

        <a href="/note/edit?id=<?= $note["id"] ?>">
            <button type="button" class="btn btn-primary">Edit</button>
        </a>


    <form method="POST" action="/note" style="display: inline">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

</main>
