<main>
    <div class="col-12 pt-5 text-center">
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
                    <th class="col text-light bg-grey">Modifier</th>
                    <th class="col text-light bg-grey">Supprimer</th>
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
                    <td><a href="/controllers/dashboard/types/update-ctrl.php?id_types=<?= $vehicle->id_vehicles ?>"><i
                                class="bi bi-pencil-square"></i></a>
                    </td>
                    <td><a href="/controllers/dashboard/types/delete-ctrl.php?id_types=<?= $vehicle->id_vehicles ?>"><i
                                class="bi bi-x-circle"></i></a></td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php if (isset($delete) && $delete === '1') { ?>
        <p class="text-success">L'enregistrement à bien été supprimé</p>
        <?php } elseif (isset($delete) && $delete === '0') { ?>
        <p class="text-danger">L'enregistrement n'a pas été supprimé</p>
        <?php } ?>
    </div>
</main>