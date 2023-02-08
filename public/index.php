<?php

// On charge en premier le routeur
require_once __DIR__ . '/../routes/web.php';

// Si rien ne filtre à travers le routeur, on charge la home page
require_once __DIR__ . '/../app/bootstrap.php';