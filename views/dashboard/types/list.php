<main>
    <div class="col-12 pt-5 text-center">
        <button class="btn bg-grey text-light mb-3 link-position"><a
                href="/controllers/dashboard/types/create-ctrl.php">Ajouter</a></button>
        <table class="table rounded table-hover mb-3">
            <thead>
                <tr>
                    <th class="bg-grey text-light col">#</th>
                    <th class="col text-light bg-grey">Type de catégorie</th>
                    <th class="col text-light bg-grey">Modifier</th>
                    <th class="col text-light bg-grey">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($types as $type) { ?>
                <tr>
                    <td><?= $type->id_types ?></td>
                    <td><?= $type->type ?></td>
                    <td><a href="/controllers/dashboard/types/update-ctrl.php?id_types=<?= $type->id_types ?>"><i
                                class="bi bi-pencil-square"></i></a>
                    </td>
                    <td><a href="/controllers/dashboard/types/delete-ctrl.php?id_types=<?= $type->id_types ?>"><i
                                class="bi bi-file-earmark-x"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>