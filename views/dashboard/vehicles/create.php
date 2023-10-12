<main>
    <div class="col-12 pt-5 text-center">
        <form method="post" enctype="multipart/form-data">

            <!-- Select Type -->
            <div class="form-floating mb-3">
                <select class="form-select" id="id_types" aria-label="id_types" name="id_types" id="id_types" required>
                    <option selected disabled>Veuillez selectioner une catégorie dans la liste </option>
                    <?php
                    foreach ($types as $type) { ?>
                    <option value="<?= $type->id_types ?>"><?= $type->type ?></option>
                    <?php }
                    ?>
                </select>
                <label for="type">Catégorie du véhicule *</label>
                <?php if (isset($errors['type'])) { ?>
                <div class="text-danger mb-3"> <?= $errors['type'] ?> </div>
                <?php } ?>
            </div>


            <!-- SELECT BRAND -->
            <div class="form-floating mb-3">
                <select class="form-select" id="brand" aria-label="brand" name="brand" id="brand" required>
                    <option selected disabled>Veuillez selectioner une marque dans la liste </option>
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

            <div class="row">
                <div class="col-6">
                    <!-- Input registration -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="registration" name="registration"
                            placeholder="ex: AB-123-AB" pattern="<?= REGEX_REGISTRATION ?>"
                            value="<?= isset($registration->registration) ?>" required>
                        <label for="registration">Immatriculation *</label>
                        <?php if (isset($errors['registration'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['registration'] ?> </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Select Year -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mileage" name="mileage" placeholder="ex: AB-123-AB"
                            pattern="<?= REGEX_MILEAGE ?>" value="<?= isset($mileage->mileage) ?>" required>
                        <label for="mileage">Kilométrage *</label>
                        <?php if (isset($errors['mileage'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['mileage'] ?> </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- <div class="mb-3">
                <label for="picture" class="form-label">Photo du véhicule</label>
                <input name="picture" class="form-control" type="file" id="picture" accept=".png, image/jpeg">
            </div> -->







            <button class="btn btn-secondary bg-grey mb-3" type="submit">Envoyer</button>
        </form>
        <?= isset($isSaved) && $isSaved ? '<p class="text-success">Véhicule enregistré</p>' : '' ?>
    </div>
</main>