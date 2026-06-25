<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= App::getInstance()->title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta name="theme-color" content="#712cf9">

</head>
<body>
<header class="navbar navbar-expand-lg bd-navbar sticky-top bg-primary navbar-dark">
    <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php?p=article.index">Home</a>
                <a class="navbar-brand" href="index.php?p=article.show">Single</a>
                <!--                --><?php //if ($auth->isLogged()){?>
                <!--                    <a class="navbar-brand" href="index.php?p=login">Login</a>-->
                <!--                --><?php //}else{?>
                <!--                    <a class="navbar-brand" href="index.php?p=login">Login</a>-->
                <!--                --><?php //} ?>
                <a class="navbar-brand" href="index.php?p=user.login">Login</a>
                <a class="navbar-brand" href="index.php?p=admin.article.index">Admin</a>

            </div>
        </div>
    </nav>
</header>
<div class="container">
    <div class="starter-template" style="padding-top:100px;">
        <?= $content; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>