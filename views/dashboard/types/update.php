<main>
    <button class="btn bg-grey text-light mb-3 link-position"><a href="/controllers/dashboard/types/list-ctrl.php">Retour</a></button>
    <div class="col-12 pt-5 text-center">
        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="type" name="type" pattern="[0-9a-zA-Zàâçéèêëîïôûùüÿñæœ .-].{1.30}" value="<?= $stdType->type ?>" required>
                <label for="type">Nom de la catégorie</label>
                <?php if (isset($errors['type'])) { ?>
                    <div class="text-danger mb-3"> <?= $errors['type'] ?> </div>
                <?php } ?>
            </div>
            <button class="btn btn-secondary bg-grey" type="submit">Modifier</button>
        </form>
        <?= isset($error) ? $error : '' ?>
    </div>
</main>