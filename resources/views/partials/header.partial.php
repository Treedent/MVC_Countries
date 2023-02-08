<?php
/***
 * Titre + Menu de l'application
 * @var array $conf
 * @var string $countrylist_active
 * @var string $regionlist_active
 * ***/

?>
<div class="p-5 mb-1 rounded-3 mt-1 text-bg-primary">
    <header class="header">
        <h1><a href="/" class="link-light"><?= $conf['app']['title']; ?></a></h1>
    </header>
</div>
<nav class="navbar navbar-expand-lg rounded-3 text-bg-primary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Navigation:</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMVC" aria-controls="navbarMVC" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMVC">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link<?= $countrylist_active;?>" aria-current="page" href="/">Liste des pays</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= $regionlist_active;?>" aria-current="page" href="/?mod=region&dis=list">Liste des pays par région</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white openOffcanvas" data-content="options.partial.html" data-title="MVC Options" href="#" aria-controls="mvcOptions">Options</a>
                </li>
            </ul>
        </div>
    </div>
</nav>