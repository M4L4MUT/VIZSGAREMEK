<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?menu=fooldal">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?menu=kapcsolat">Kapcsolat</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?= $auto = filter_input(INPUT_GET, "auto"); ?>