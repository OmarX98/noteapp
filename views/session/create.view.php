<?php view( "partials/header.php") ?>
<?php view("partials/nav.php") ?>
<form action="/session" method="post" style="margin: auto; margin-top: 5%; width: 50%; line-height: 40px">
    <h2 style="text-align: center"> Login </h2>

    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1"
               name="email"
               aria-describedby="emailHelp"
               value="<?= old("email") ?>"
               placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>

    <button style="margin-top: 5px; float: right" type="submit" class="btn btn-primary">Login</button>

    <?php if(!empty($errors)):?>
        <?php foreach($errors as $error):?>
            <li style="color: red"><?= $error; ?></li>
        <?php endforeach ?>
    <?php endif ?>

</form>