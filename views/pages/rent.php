<main>
    <hr class="border border-primary border-3 opacity-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if (isset($isInserted)) { ?>
                    <p class="text-success text-center">Réservation effectué avec succès. Notre équipe vous la confirmera au
                        plus vite.
                    </p>
                <?php } ?>

                <h2 class="fs-1 text-center my-5">Finalisez la location du véhicule</h2>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-10 col-md-5 offset-md-1 py-3 d-flex justify-content-end">
                        <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="img-fluid w-50 rounded-2 " alt="Photo de la <?= $vehicle->brand ?> - <?= $vehicle->model ?>">
                    </div>
                    <div class="col-12 col-md-5 d-flex align-items-center ">
                        <ul id="details">
                            <li>
                                <h1><?= $vehicle->brand ?> - <?= $vehicle->model ?></h1>
                            </li>
                            <li>Modèle : <?= $vehicle->model ?></li>
                            <li>Immatriculation : <?= $vehicle->registration ?></li>
                            <li>Kilométrage : <?= $vehicle->mileage ?> kms</li>
                            <li>Disponible depuis le : <?= $dateFormated ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" class="mb-3" id="myForm">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="firstname" class="form-control" id="firstname" name="firstname" placeholder="ex: John" pattern="<?= REGEX_NAME ?>" required>
                        <label for="firstname">Votre prénom *</label>
                    </div>
                    <?php if (isset($errors['firstname'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['firstname'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="lastname" class="form-control" id="lastname" name="lastname" placeholder="ex: Dupont" pattern="<?= REGEX_NAME ?>" required>
                        <label for="lastname">Votre nom *</label>
                    </div>
                    <?php if (isset($errors['lastname'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['lastname'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="email">Votre mail *</label>
                    </div>
                    <?php if (isset($errors['email'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['email'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="01/01/1970" max="<?= date('Y-m-d') ?>" required>
                        <label for="birthday">Votre date de naissance *</label>
                    </div>
                    <?php if (isset($errors['birthday'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['birthday'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="ex: 0601010101" pattern="<?= REGEX_PHONE ?>" required>
                        <label for="phone">Votre numéro de téléphone *</label>
                    </div>
                    <?php if (isset($errors['phone'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['phone'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="zipcode" name="zipcode" maxlength="5" placeholder="ex : 05100" pattern="<?= REGEX_CP ?>" required>
                        <label for="zipcode">Votre code postal *</label>
                    </div>
                    <?php if (isset($errors['zipcode'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['zipcode'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="city" name="city" required>
                            <option selected disabled>Sélectionner la commune</option>
                        </select>
                        <label for="city">Votre ville *</label>
                    </div>
                    <?php if (isset($errors['city'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['city'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" id="startdate" name="startdate" placeholder="30/10/2023" required>
                        <label for="startdate">Date du début de location *</label>
                    </div>
                    <?php if (isset($errors['startdate'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['startdate'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" id="enddate" name="enddate" placeholder="30/10/2023" required>
                        <label for="enddate">Date de fin de location *</label>
                    </div>
                    <?php if (isset($errors['enddate'])) { ?>
                        <div class="text-danger mb-3"> <?= $errors['enddate'] ?> </div>
                    <?php } ?>
                </div>
                <div class="col-12 d-flex justify-content-center ">
                    <button class="btn btn-primary my-3" type="submit">Louer le
                        véhicule</button>
                </div>
            </div>
        </form>
    </div>
</main>
<script src="/public/assets/js/city.js"></script>