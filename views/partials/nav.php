<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= (urlIs("/") ? "active" : "" ); ?>" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (urlIs("/about") ? "active" : "" ); ?>" href="/about">about</a>
                </li>
                <?php if($_SESSION["user"]):?>
                    <li class="nav-item">
                        <a class="nav-link <?= (urlIs("/notes") ? "active" : "" ); ?>" href="/notes">notes</a>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link <?= (urlIs("/contact") ? "active" : "" ); ?>" href="/contact">contact</a>
                </li>
            </ul>
                <?php if($_SESSION["user"]["email"]?? false): ?>
                    <span style="color: goldenrod; margin: 5px">
                        <?= $_SESSION["user"]["email"] ?>
                    </span>
                    <form action="/session" method="POST">\
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-outline-secondary" type="submit" style="margin: 5px">Logout</button>
                    </form>


                <?php else: ?>
                    <a href="/register">
                        <button class="btn btn-outline-secondary" type="submit" style="margin: 5px"> Register</button>
                    </a>
                    <a href="/login">
                        <button class="btn btn-outline-secondary" type="submit" style="margin: 5px"> login</button>
                    </a>

                <?php endif ?>
        </div>
    </div>
</nav>
