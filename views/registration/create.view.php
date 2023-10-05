<?php view( "partials/header.php") ?>
<?php view("partials/nav.php") ?>

<main>
    <form method="post" action="/register" style="margin: auto; margin-top: 5%; width: 50%; line-height: 40px">
        <h1 style="text-align: center">Register a new account</h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password-confirmation" placeholder="Confirm Password">
        </div>

        <button style="margin-top: 5px; float: right" type="submit" class="btn btn-primary">Register</button>
    </form>
    <?php if(!empty($errors)):?>
        <?php foreach($errors as $error):?>
        <li style="color: red"><?= $error; ?></li>
        <?php endforeach ?>
    <?php endif ?>
</main>

<?php view("partials/footer.php") ?>
