<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Dashboard" />
    <meta name="description" content="<?= $description ?>" />
    <meta name="author" content="Justin Verhaeghe" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alatsi&family=Pacifico&family=Roboto&family=Titan+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/assets/css/style.css" />
    <link rel="stylesheet" href="/public/assets/css/<?= $style ?>.css" />
    <?php
    if (isset($script)) { ?>
        <script defer src="/public/assets/js/<?= $script ?>.js"></script>
    <?php } ?>

    <title><?= $title ?></title>
</head>

<body>

    <header>
        <div class="container-fluid" id="navbar">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <a href="/index.php">
                        <img src="/public/assets/img/logo.png" alt="logo rent my ride black and white" class="img-fluid" id="mainlogo">
                    </a>
                </div>
                <div class="col-12 col-sm-8 d-flex justify-content-end align-items-center">
                    <ul class="menu">
                        <li><a href="/controllers/public/home-ctrl.php#vehicles">Nos Véhicules</a></li>
                        <li class="vr mx-3 border-light"></li>
                        <li><a href="/controllers/public/home-ctrl.php#quisommesnous">Qui sommes nous ?</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row py-5">
                <h1 class="d-none">RENT MY RIDE</h1>
                <div id="titleText" class="col-8 pt-5 text-center">
                    <p class="title ps-5 ">Trouvez et réservez <span class="easy">facilement</span></p>
                    <p class="title ps-5">avec <span class="rentmyride">RENT MY RIDE</span></p>
                    <p class="subtext ps-5">Trouvez une location quelque soit votre localisation</p>
                    <div class="text-center">
                        <img src="/public/assets/img/app_store.png" alt="logo app store" class=" img-fluid appLogo">
                        <img src="/public/assets/img/google_play.png" alt="logo app store" class=" img-fluid appLogo">
                    </div>
                </div>
                <div class="col-4" id="slogan"></div>
            </div>
        </div>



    </header>