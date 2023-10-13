<main>
    <div class="col-12 pt-5 text-center">
        <button class="btn bg-grey text-light mb-3 link-position"><a
                href="/controllers/dashboard/vehicles/create-ctrl.php">Ajouter</a></button>
        <table class="table rounded table-hover mb-3">
            <thead>
                <tr>
                    <th class="col text-light bg-grey"><a
                            href="?column=type&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Catégorie <i
                                class="bi bi-arrow-down-up"></i></a></th>

                    <th class="col text-light bg-grey"><a
                            href="?column=brand&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Marque
                            <i class="bi bi-arrow-down-up"></i></a></th>

                    <th class="col text-light bg-grey"><a
                            href="?column=model&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Modèle <i
                                class="bi bi-arrow-down-up"></i></a></th>
                    <th class="col text-light bg-grey"><a
                            href="?column=registration&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Immat. <i
                                class="bi bi-arrow-down-up"></i></th>
                    <th class="col text-light bg-grey"><a
                            href="?column=mileage&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Km <i
                                class="bi bi-arrow-down-up"></i></a></th>
                    <th class="col text-light bg-grey">Modifier</th>
                    <th class="col text-light bg-grey">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vehicles as $vehicle) { ?>
                <tr>
                    <td><?= $vehicle->type ?></td>
                    <td><?= $vehicle->brand ?></td>
                    <td><?= $vehicle->model ?></td>
                    <td><?= $vehicle->registration ?></td>
                    <td><?= $vehicle->mileage ?></td>
                    <td><a
                            href="/controllers/dashboard/vehicles/update-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>"><i
                                class="bi bi-pencil-square"></i></a>
                    </td>
                    <td><a
                            href="/controllers/dashboard/vehicles/delete-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>"><i
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