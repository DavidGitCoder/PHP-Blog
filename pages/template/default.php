<?php

use App\Apps;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Apps::getTitle()?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta name="theme-color" content="#712cf9">

</head>
<body>
<header class="navbar navbar-expand-lg bd-navbar sticky-top bg-primary navbar-dark">
    <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php?p=home">Home</a>
                <a class="navbar-brand" href="index.php?p=single">Single</a>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <div class="starter-template" style="padding-top:100px;">
    <?= $content; ?>
    </div>
</div>
</body>
</html>