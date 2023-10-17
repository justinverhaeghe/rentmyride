<main>
    <div class="col-12 pt-5 text-center">
        <div class="row">
            <div class="col-6 text-start ">
                <h4>Véhicules Actifs</h4>
            </div>
            <div class="col-6">
                <button class="btn bg-grey text-light mb-3 link-position"><a
                        href="/controllers/dashboard/vehicles/create-ctrl.php">Ajouter</a></button>

            </div>
        </div>
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
                    <th class="col text-light bg-grey">Photo</th>
                    <th class="col text-light bg-grey">Modifier</th>
                    <th class="col text-light bg-grey">Archiver</th>
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
                    <td><?php if (isset($vehicle->picture)) { ?>
                        <a data-bs-toggle="modal" data-bs-target="#<?= $vehicle->id_vehicles ?>"><i
                                class="bi bi-image"></i></a>
                        <div class="modal fade" id="<?= $vehicle->id_vehicles ?>" tabindex="-1"
                            aria-labelledby="picture" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>"
                                            alt="photo du véhicule" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </td>
                    <td><a
                            href="/controllers/dashboard/vehicles/update-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>"><i
                                class="bi bi-pencil-square"></i></a>
                    </td>
                    <td><a
                            href="/controllers/dashboard/vehicles/archive-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>"><i
                                class="bi bi-archive-fill"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php if (isset($archive) && $archive === '1') { ?>
        <p class="text-success">L'enregistrement à bien été archivé</p>
        <?php } elseif (isset($archive) && $archive === '0') { ?>
        <p class="text-danger">L'enregistrement n'a pas été archivé</p>
        <?php } ?>
    </div>

    <div class="col-12 pt-5 text-center">
        <div class="row">
            <div class="col-6 text-start ">
                <h4>Véhicules Archivés</h4>
            </div>
        </div>
        <table class="table rounded table-hover mb-3">
            <thead>
                <tr>
                    <th class="col text-light bg-grey"><a
                            href="?column=type&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Catégorie <i
                                class="bi bi-arrow-down-up"></i></a></th>
                    <th class="col text-light bg-grey"><a
                            href="?column=brand&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Marque<i
                                class="bi bi-arrow-down-up"></i></a></th>
                    <th class="col text-light bg-grey"><a
                            href="?column=model&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Modèle <i
                                class="bi bi-arrow-down-up"></i></a></th>
                    <th class="col text-light bg-grey"><a
                            href="?column=registration&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Immat. <i
                                class="bi bi-arrow-down-up"></i></th>
                    <th class="col text-light bg-grey"><a
                            href="?column=mileage&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">Km <i
                                class="bi bi-arrow-down-up"></i></a></th>
                    <th class="col text-light bg-grey">Photo</th>
                    <th class="col text-light bg-grey">Désarchiver</th>
                    <th class="col text-light bg-grey">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($archivedVehicles as $vehicle) { ?>
                <tr>
                    <td><?= $vehicle->type ?></td>
                    <td><?= $vehicle->brand ?></td>
                    <td><?= $vehicle->model ?></td>
                    <td><?= $vehicle->registration ?></td>
                    <td><?= $vehicle->mileage ?></td>
                    <?php if (isset($vehicle->picture)) { ?>
                    <td><a href="/public/uploads/vehicles/<?= $vehicle->picture ?>" target="_blank"><i
                                class="bi bi-image"></i></a></td>
                    <?php } else { ?>
                    <td></td>
                    <?php } ?>

                    <td><a
                            href="/controllers/dashboard/vehicles/restore-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>"><i
                                class="bi bi-archive-fill"></i></a></td>
                    <td><a
                            href="/controllers/dashboard/vehicles/delete-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>"><i
                                class="bi bi-x-circle"></i></a></td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php if (isset($restore) && $restore === '1') { ?>
        <p class="text-success">L'enregistrement à bien été restauré</p>
        <?php } elseif (isset($restore) && $restore === '0') { ?>
        <p class="text-danger">L'enregistrement n'a pas été restauré</p>
        <?php } elseif (isset($delete) && $delete === '1') { ?>
        <p class="text-success">L'enregistrement à bien été supprimé</p>
        <?php } elseif (isset($delete) && $delete === '0') { ?>
        <p class="text-danger">L'enregistrement n'a pas été supprimé</p>
        <?php } ?>
    </div>
</main>