<main>
    <div class="col-12 pt-5 text-center">
        <form method="post" enctype="multipart/form-data">

            <!-- Select Type -->
            <div class="form-floating mb-3">
                <select class="form-select" id="id_types" aria-label="id_types" name="id_types" id="id_types" required>
                    <option disabled>Veuillez selectioner une catégorie dans la liste </option>
                    <?php
                    foreach ($types as $type) { ?>
                    <?php $isSelected = ($stdVehicle->id_types == $type->id_types) ? 'selected' : ''; ?>
                    <option <?= $isSelected ?> value="<?= $type->id_types ?>"><?= $type->type ?></option>
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
                    <option disabled>Veuillez selectioner une marque dans la liste </option>
                    <?php
                    foreach ($brandDatas as $brand) { ?>
                    <option <?= ($vehicleObj == $brand) ? 'selected' : ''; ?>><?= $brand ?></option>
                    <?php }
                    ?>
                </select>
                <label for=" brand">Marque du véhicule *</label>
                <?php if (isset($errors['brand'])) { ?>
                <div class="text-danger mb-3"> <?= $errors['brand'] ?> </div>
                <?php } ?>
            </div>

            <!-- INPUT Modèle -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="model" name="model" placeholder="ex: Motos"
                    pattern="<?= REGEX_MODEL ?>" value="<?= $stdVehicle->model ?>" required>
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
                            value="<?= $stdVehicle->registration ?>" required>
                        <label for="registration">Immatriculation *</label>
                        <?php if (isset($errors['registration'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['registration'] ?> </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Select km -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mileage" name="mileage" placeholder="ex: AB-123-AB"
                            pattern="<?= REGEX_MILEAGE ?>" value="<?= $stdVehicle->mileage ?>" required>
                        <label for="mileage">Kilométrage *</label>
                        <?php if (isset($errors['mileage'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['mileage'] ?> </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php if (isset($stdVehicle->picture)) { ?>
            <div class="d-flex justify-content-center ">
                <div class="card w-25 mb-3">
                    <img src="/public/uploads/vehicles/<?= $stdVehicle->picture ?>" alt="img du véhicule"
                        class="img-fluid rounded-top ">
                    <div class="card-body">
                        <p class="card-text form-check">
                            <input class="form-check-input" name="deleteImg" type="checkbox" value="true"
                                id="deleteImg">
                            <label class="form-check-label" for="deleteImg">
                                Supprimer l'image ?
                            </label>
                        </p>
                    </div>
                </div>
            </div>

            <?php } ?>

            <div class="mb-3 d-none" id="pictureFile">
                <label for="picture" class="form-label">Photo du véhicule</label>
                <input name="picture" class="form-control" type="file" id="picture" value="<?= $stdVehicle->picture ?>"
                    accept=".png, image/jpeg">
            </div>







            <button class="btn btn-secondary bg-grey mb-3" type="submit">Envoyer</button>
        </form>
        <?= isset($isSaved) && $isSaved ? '<p class="text-success">Véhicule enregistré</p>' : '' ?>
    </div>
</main>