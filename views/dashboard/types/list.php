<main>
    <div class="col-12 pt-5 text-center">
        <table class="table rounded table-hover mb-3">
            <thead>
                <tr>
                    <th class="bg-grey text-light col">ID</th>
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
    </div>
</main>