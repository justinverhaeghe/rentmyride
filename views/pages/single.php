<main>
    <hr class="border border-primary border-3 opacity-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 col-md-5 offset-md-1 py-3">
                <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="img-fluid rounded-5 "
                    alt="Photo de la <?= $vehicle->brand ?> - <?= $vehicle->model ?>">
            </div>
            <div class="col-12 col-md-5 d-flex align-items-center ">
                <ul id="details">
                    <li>
                        <h1><?= $vehicle->brand ?> - <?= $vehicle->model ?></h1>
                    </li>
                    <li>Modèle : <?= $vehicle->model ?></li>
                    <li>Immatriculation : <?= $vehicle->registration ?></li>
                    <li>Kilométrage : <?= $vehicle->mileage ?> kms</li>
                    <li>Disponible depuis le : <?= $dateFormated ?></li>
                    <a href="/controllers/public/rent-ctrl.php?id=<?= $vehicle->id_vehicles ?>"
                        class="btn btn-primary my-2">Louer le véhicule</a>
                </ul>
            </div>
        </div>
    </div>
</main>