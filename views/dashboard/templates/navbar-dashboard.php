<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-4 col-md-4" id="sidebar">
            <div class="row">
                <div class="col-12 text-center my-5">
                    <a href="/controllers/dashboard/dashboard-ctrl.php">
                        <img src="/public/assets/img/logo.png" alt="logo rent my ride" class="w-50 img-fluid">
                    </a>
                </div>
                <div class="col-12 ps-5">
                    <ul>
                        <li class="fs-5">Catégorie</li>
                        <li class="mb-3"><a href="/controllers/dashboard/types/create-ctrl.php"><i class="bi bi-folder-plus icons"></i>
                                <div class="vr mx-2"></div><span class="menu-text">
                                    Ajouter une catégorie</span>
                            </a></li>
                        <li class="mb-5"><a href="/controllers/dashboard/types/list-ctrl.php"><i class="bi bi-tag icons"></i>
                                <div class="vr mx-2"></div><span class="menu-text">
                                    Liste des catégories</span>
                            </a></li>
                        <li class="fs-5">Véhicules</li>
                        <li class="mb-3"><a href="/controllers/dashboard/vehicles/create-ctrl.php"><i class="bi bi-plus-circle icons"></i>
                                <div class="vr mx-2"></div><span class="menu-text">
                                    Ajouter un véhicule</span>
                            </a></li>
                        <li class="mb-5"><a href="/controllers/dashboard/vehicles/list-ctrl.php"><i class="bi bi-car-front-fill icons"></i>
                                <div class="vr mx-2"></div><span class="menu-text">
                                    Liste des véhicules</span>
                            </a></li>
                        <li class="mb-3"><a href="/index.php"><i class="bi bi-arrow-return-left icons"></i>
                                <div class="vr mx-2"></div><span class="menu-text"> Retour au site</span>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-8 col-md-8" id="content">
            <div class="row">
                <div class="col-12 pt-5 text-center">
                    <h2><?= $page ?></h2>
                </div>