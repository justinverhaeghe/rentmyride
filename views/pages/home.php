<main>
    <div class="container-fluid" id="vehicles">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h2>Nos Véhicules</h2>
            </div>
        </div>
        <div class="row justify-content-around">
            <?php foreach ($vehicles as $vehicle) { ?>
            <div class="col-12 col-sm-6 col-md-4 mb-2">
                <div class="row">
                    <div class="col-10 offset-1 mb-3">
                        <div class="card h-100">
                            <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top"
                                alt="<?= $vehicle->picture ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="card-title text-center"><?= $vehicle->type ?></h5>
                                    </div>
                                    <div class="col-6 text-center">
                                        <p class="fs-5"><?= $vehicle->brand ?></p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <p class="fs-5"><?= $vehicle->model ?></p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <p class="fs-5"><?= $vehicle->registration ?></p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <p class="fs-5"><?= $vehicle->mileage ?> kms</p>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a href="/controllers/public/single-ctrl.php?id=<?= $vehicle->id_vehicles ?>"
                                            class="btn btn-primary">Fiche du
                                            véhicule</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php } ?>
        </div>
        <div class="row py-5" id="quisommesnous">
            <div class="col-12 text-center py-5">
                <h2>Qui sommes-nous ?</h2>
            </div>
            <div class="col-12 col-sm-4 col-md-4" id="dodge"></div>
            <div class="col-12 col-sm-8" id="whoarewe">
                <innove class="text-center">Né de l’imagination d’un génie du marketing, <span class="rentmyride">RENT
                        MY
                        RIDE</span> innove (ou presque) dans le business de la location de voiture.</p>
                    <p class="text-center">Ici, aucun prix, on accorde les locations à tout le monde</p>
                    <p class="text-center"><span class="easy">gratuitement</span></p>
            </div>

        </div>
    </div>

</main>