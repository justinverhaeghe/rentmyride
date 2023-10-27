<main>
    <div class="col-12 pt-5 text-center">
        <h2>Liste des Réservations</h2>

        <table class="table rounded table-hover mb-3">
            <thead>
                <tr>
                    <th class="bg-grey text-light col">#</th>
                    <th class="col text-light bg-grey">Nom & prénom</th>
                    <th class="col text-light bg-grey">Véhicule</th>
                    <th class="col text-light bg-grey">Date début</th>
                    <th class="col text-light bg-grey">Date fin</th>
                    <th class="col text-light bg-grey">Crée le</th>
                    <th class="col text-light bg-grey">Confirmé le</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rents as $rent) {
                    // Formatage des dates created_at, confirmed_at, startdate et endDate.
                    $dateCreated = $rent->created_at;
                    $date = new DateTime($dateCreated);
                    $dateCreatedAt = $date->format('d-m-Y');
                    if (!$rent->confirmed_at == NULL) {
                        $dateConfirmed = $rent->confirmed_at;
                        $date = new DateTime($dateConfirmed);
                        $dateConfirmedAt = $date->format('d-m-Y');
                    }

                    $dateStart = $rent->startdate;
                    $date = new DateTime($dateStart);
                    $dateStartAt = $date->format('d-m-Y / H:i');
                    $dateEnd = $rent->enddate;
                    $date = new DateTime($dateEnd);
                    $dateEndAt = $date->format('d-m-Y / H:i') ?>
                <tr>
                    <td><?= $rent->id_rents ?></td>
                    <td><?= $rent->lastname . ' ' . $rent->firstname ?></td>
                    <td><?= $rent->brand . ' ' . $rent->model ?></td>
                    <td><?= $dateStartAt ?></td>
                    <td><?= $dateEndAt ?></td>
                    <td><?= $dateCreatedAt ?></td>
                    <td><?= isset($dateConfirmedAt) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="col-12 pt-5 text-center">

        <h2>Liste des véhicules</h2>
        <button class="btn bg-grey text-light mb-3 link-position"><a
                href="/controllers/dashboard/vehicles/create-ctrl.php">Ajouter</a></button>
        <table class="table rounded table-hover mb-3">
            <thead>
                <tr>
                    <th class="bg-grey text-light col">#</th>
                    <th class="col text-light bg-grey">Catégorie</th>
                    <th class="col text-light bg-grey">Marque</th>
                    <th class="col text-light bg-grey">Modèle</th>
                    <th class="col text-light bg-grey">Immat.</th>
                    <th class="col text-light bg-grey">Km</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vehicles as $vehicle) { ?>
                <tr>
                    <td><?= $vehicle->id_vehicles ?></td>
                    <td><?= $vehicle->type ?></td>
                    <td><?= $vehicle->brand ?></td>
                    <td><?= $vehicle->model ?></td>
                    <td><?= $vehicle->registration ?></td>
                    <td><?= $vehicle->mileage ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <button class="btn bg-grey text-light mb-3 link-position"><a
                href="/controllers/dashboard/vehicles/list-ctrl.php">Voir plus</a></button>
    </div>

    <div class="col-12 pt-5 text-center">

        <h2>Liste des catégories</h2>
        <button class="btn bg-grey text-light mb-3 link-position"><a
                href="/controllers/dashboard/types/create-ctrl.php">Ajouter</a></button>
        <table class="table rounded table-hover mb-3">
            <thead>
                <tr>
                    <th class="bg-grey text-light col">#</th>
                    <th class="col text-light bg-grey">Type de catégorie</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($types as $type) { ?>
                <tr>
                    <td><?= $type->id_types ?></td>
                    <td><?= $type->type ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <button class="btn bg-grey text-light mb-3 link-position"><a
                href="/controllers/dashboard/types/list-ctrl.php">Voir plus</a></button>

    </div>
</main>