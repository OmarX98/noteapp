<?php view("partials/header.php") ?>
<?php view("partials/nav.php") ?>
<h1><?= $heading ?></h1>

<main>

    <?php foreach($notes as $note):?>

                <li>
                    <a href="/note?id=<?= $note["id"] ?>" >
                    <?= htmlspecialchars($note["body"]) ?>
                    </a>
                </li>

    <?php endforeach ?>
    <a href="/notes/create">
        create note
    </a>

</main>
<?php view("partials/footer.php") ?>
