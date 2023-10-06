<main>
    <div class="col-12 pt-5 text-center">
        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="type" name="type" placeholder="ex: Motos"
                    pattern="[0-9a-zA-Zàâçéèêëîïôûùüÿñæœ .-].{1.30}" required>
                <label for="type">Nom de la catégorie *</label>
                <?php if (isset($errors['type'])) { ?>
                <div class="text-danger mb-3"> <?= $errors['type'] ?> </div>
                <?php } ?>
            </div>
            <button class="btn btn-secondary" type="submit">Envoyer</button>
        </form>
        <?= isset($isSaved) && $isSaved ? '<p class="text-success">Catégorie enregistré</p>' : '' ?>
    </div>
</main>