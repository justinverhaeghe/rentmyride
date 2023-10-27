<main>

    <?php if (isset($confirm) && $confirm === '1') { ?>
    <p class="text-success text-center">L'enregistrement à bien été confirmé</p>
    <?php } elseif (isset($confirm) && $confirm === '0') { ?>
    <p class="text-danger text-center">L'enregistrement n'a pas été confirmé</p>
    <?php } ?>
    <table class="table rounded table-hover my-3">
        <thead>
            <tr>
                <th class="bg-grey text-center  text-light col">#</th>
                <th class="col text-light bg-grey text-center ">Nom & prénom</th>
                <th class="col text-light bg-grey text-center ">Véhicule</th>
                <th class="col text-light bg-grey text-center ">Date début</th>
                <th class="col text-light bg-grey text-center ">Date fin</th>
                <th class="col text-light bg-grey text-center ">Date de Réservation</th>
                <th class="col text-light bg-grey text-center ">Confirmé le</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rents as $rent) {
                // Formatage des dates created_at, confirmed_at, startdate et endDate.
                $dateCreated = $rent->created_at;
                $date = new DateTime($dateCreated);
                $dateCreatedAt = $date->format('d-m-Y');
                $dateConfirmedAt = null;

                if (!$rent->confirmed_at == NULL) {
                    $dateConfirmed = $rent->confirmed_at;
                    $date = new DateTime($dateConfirmed);
                    $dateConfirmedAt = $date->format('d-m-Y');
                } else {
                    $dateConfirmed = null;
                }

                $dateStart = $rent->startdate;
                $date = new DateTime($dateStart);
                $dateStartAt = $date->format('d-m-Y / H:i');

                $dateEnd = $rent->enddate;
                $date = new DateTime($dateEnd);
                $dateEndAt = $date->format('d-m-Y / H:i') ?>
            <tr>
                <td class="text-center"><?= $rent->id_rents ?></td>
                <td class="text-center"><?= $rent->lastname . ' ' . $rent->firstname ?></td>
                <td class="text-center"><?= $rent->brand . ' ' . $rent->model ?></td>
                <td class="text-center"><?= $dateStartAt ?></td>
                <td class="text-center"><?= $dateEndAt ?></td>
                <td class="text-center"><?= $dateCreatedAt ?></td>
                <td class="text-center"><?php if (!$dateConfirmedAt == null) {
                                                echo $dateConfirmedAt;
                                            } else { ?>
                    <a href="/controllers/dashboard/rents/confirm-ctrl.php?id_rents=<?= $rent->id_rents ?>"><i
                            class="bi bi-clipboard2-check-fill  icons"></i></a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</main>