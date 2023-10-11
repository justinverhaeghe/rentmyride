<main>
    <div class="col-12 pt-5 text-center">
        <h2>Formulaire d'ajout d'un véhicule dans la base de données</h2>
        <form method="post">

            <!-- SELECT BRAND -->
            <div class="form-floating mb-3">
                <select class="form-select" id="brand" aria-label="brand" name="brand" id="brand" required>
                    <option selected disabled>----- Veuillez selectioner une option dans la liste ----- </option>
                    <?php
                    foreach ($brandDatas as $brand) { ?>
                    <option><?= $brand ?></option>
                    <?php }
                    ?>
                </select>
                <label for="brand">Marque du véhicule *</label>
                <?php if (isset($errors['brand'])) { ?>
                <div class="text-danger mb-3"> <?= $errors['brand'] ?> </div>
                <?php } ?>
            </div>

            <!-- INPUT Modèle -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="model" name="model" placeholder="ex: Motos"
                    pattern="<?= REGEX_MODEL ?>" value="<?= isset($model->model) ?>" required>
                <label for="model">Modèle du véhicule *</label>
                <?php if (isset($errors['model'])) { ?>
                <div class="text-danger mb-3"> <?= $errors['model'] ?> </div>
                <?php } ?>
            </div>








            <button class="btn btn-secondary bg-grey mb-3" type="submit">Envoyer</button>
        </form>
        <?= isset($isSaved) && $isSaved ? '<p class="text-success">Catégorie enregistré</p>' : '' ?>
    </div>
</main>