<main>
    <hr class="border border-primary border-3 opacity-100">
    <div class="container-fluid">
        <h2 class="fs-1 text-center my-5">Finalisez la location du véhicule</h2>
        <form method="post" class="mb-3">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="firstname" class="form-control" id="firstname" name="firstname"
                            placeholder="ex: John" pattern="<?= REGEX_NAME ?>" required>
                        <label for="firstname">Votre prénom *</label>
                    </div>
                    <?php if (isset($errors['firstname'])) { ?>
                    <div class="text-danger mb-3"> <?= $errors['firstname'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="lastname" class="form-control" id="lastname" name="lastname"
                            placeholder="ex: Dupont" pattern="<?= REGEX_NAME ?>" required>
                        <label for="lastname">Votre nom *</label>
                    </div>
                    <?php if (isset($errors['lastname'])) { ?>
                    <div class="text-danger mb-3"> <?= $errors['lastname'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                            required>
                        <label for="email">Votre mail *</label>
                    </div>
                    <?php if (isset($errors['email'])) { ?>
                    <div class="text-danger mb-3"> <?= $errors['email'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="01/01/1970"
                            max="<?= date('Y-m-d') ?>" required>
                        <label for="birthdate">Votre date de naissance *</label>
                    </div>
                    <?php if (isset($errors['birthdate'])) { ?>
                    <div class="text-danger mb-3"> <?= $errors['birthdate'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="0601010101"
                            pattern="<?= REGEX_PHONE ?>" required>
                        <label for="phone">Votre numéro de téléphone *</label>
                    </div>
                    <?php if (isset($errors['phone'])) { ?>
                    <div class="text-danger mb-3"> <?= $errors['phone'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="ex : 05100"
                            pattern="<?= REGEX_CP ?>" required>
                        <label for="zipcode">Votre code postal *</label>
                    </div>
                    <?php if (isset($errors['zipcode'])) { ?>
                    <div class="text-danger mb-3"> <?= $errors['zipcode'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="city" name="city" placeholder="ex : Paris" required>
                        <label for="city">Votre ville *</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="startdate" name="startdate" placeholder="30/10/2023"
                            required>
                        <label for="startdate">Date du début de location *</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="enddate" name="enddate" placeholder="30/10/2023"
                            required>
                        <label for="enddate">Date de fin de location *</label>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="/controllers/public/rent-ctrl.php?id=<?= $vehicle->id_vehicles ?>"
                        class="btn btn-primary my-2">Louer le véhicule</a>
                </div>
            </div>
        </form>
    </div>
</main>