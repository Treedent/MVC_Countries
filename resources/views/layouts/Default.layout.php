<?php
    /*** Default Layout ***/
    global $conf, $countrylist_active, $regionlist_active;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{pageTitle}</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/mvc.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/imgs/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/imgs/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/imgs/favicon-16x16.png">
    <link rel="manifest" href="assets/imgs/site.webmanifest">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            require_once __DIR__ . '/../partials/header.partial.php';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <main id="mainContent" class="p-3">
                {pageContent}
            </main>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php
            require_once __DIR__ . '/../partials/footer.partial.php';
            ?>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" data-bs-scroll="false" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="mvcOffCanvas" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body"></div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/mvc.min.js"></script>

</body>
</html>