<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-4 col-md-4" id="sidebar">
            <div class="row">
                <div class="col-12">
                    <a href="/controllers/dashboard/dashboard-ctrl.php">
                        <h1 class="text-center text-light m-5">DASHBOARD</h1>
                    </a>
                </div>
                <div class="col-12 ps-5">
                    <ul>
                        <li class="mb-3"><a href="/controllers/dashboard/types/create-ctrl.php"><i
                                    class="bi bi-folder-plus icons"></i><span class="menu-text">
                                    Ajouter une catégorie</span></a></li>
                        <li class="mb-3"><a href="/controllers/dashboard/types/list-ctrl.php"><i
                                    class="bi bi-tag icons"></i><span class="menu-text">
                                    Lister les catégories</span></a></li>
                        <li class="mb-5"><a href=""><i class="bi bi-car-front-fill icons"></i><span class="menu-text">
                                    Véhicules</span></a></li>
                        <li class="mb-3"><a href="/index.php"><i class="bi bi-arrow-return-left icons"></i><span
                                    class="menu-text"> Retour au site</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-8 col-md-8" id="content">
            <div class="row">
                <div class="col-12 pt-5 text-center">
                    <h2><?= $page ?></h2>
                </div>