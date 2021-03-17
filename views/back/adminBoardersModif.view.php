<?php
ob_start();
?>

<h2 class="my_titleH2 text-center mt-5 mb-5 pb-5">Modifier un animal</h2>

<form class="mx-5" method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="step" value="2">


    <label for="status">Statut</label>
    <select class="form-control" id="status" name="status" onchange="submit()">
        <option></option>
        <?php foreach ($status as $statu) : ?>
            <option value="<?= $statu['id_status'] ?>" <?php
                                                        if (isset($_POST['status']) && $_POST['status'] ===  $statu['id_status']) echo "selected" ?>>
                <?= $statu['wording_status'] ?>
            </option>
        <?php endforeach ?>
    </select>

</form>

<?php if (isset($_POST['status']) && (int)$_POST['step'] >= 2) { ?>

    <form class="mx-5" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="step" value="3">
        <input type="hidden" name="status" value="<?= $_POST['status'] ?>">

        <label for="actualities">Type</label>
        <select class="form-control" id="typeAnimal" name="typeAnimal" onchange="submit()">
            <option></option>
            <option value="Chat" <?php
                                    if (isset($_POST['typeAnimal']) && $_POST['typeAnimal'] ===  "Chat") echo "selected" ?>>Chat</option>
            <option value="Chien" <?php
                                    if (isset($_POST['typeAnimal']) && $_POST['typeAnimal'] ===  "Chien") echo "selected" ?>>Chien</option>
            <option value="Lapin" <?php
                                    if (isset($_POST['typeAnimal']) && $_POST['typeAnimal'] ===  "Lapin") echo "selected" ?>>Lapin</option>
            <option value="Hamster" <?php
                                    if (isset($_POST['typeAnimal']) && $_POST['typeAnimal'] ===  "Hamster") echo "selected" ?>>Hamster</option>
        </select>

    </form>
<?php } ?>

<?php if (isset($_POST['status']) && (int)$_POST['step'] >= 3) { ?>

    <form class="mx-5" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="step" value="4">
        <input type="hidden" name="status" value="<?= $_POST['status'] ?>">
        <input type="hidden" name="typeAnimal" value="<?= $_POST['typeAnimal'] ?>">

        <label for="animal">Nom</label>
        <select class="form-control" id="animal" name="animal" onchange="submit()">
            <option></option>
            <?php foreach ($data['animals']  as $animal) : ?>
                <option value="<?= $animal['id_animal'] ?>" <?php
                                                            if (isset($_POST['animal']) && $_POST['animal'] ===  $animal['id_animal']) echo "selected" ?>>
                    <?= $animal['name_animal'] ?>
                </option>
            <?php endforeach ?>

        </select>

    </form>
<?php } ?>

<?php if (isset($_POST['status']) && (int)$_POST['step'] >= 4) { ?>

    <form class="mx-5" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="step" value="5">
        <input type="hidden" name="status" value="<?= $_POST['status'] ?>">
        <input type="hidden" name="typeAnimal" value="<?= $_POST['typeAnimal'] ?>">
        <input type="hidden" name="animal" value="<?= $_POST['animal'] ?>" id="idAnimal">

        <form class="mx-5" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row no-gutters align-items-center col-4">
                    <label for="nameAnimal" class="col-12 cold-md-auto pr-2">Nom : </label>
                    <input type="text" class="col form-control" id="nameAnimal" name="nameAnimal" value="<?= $data['animal']['name_animal'] ?>">
                </div>
                <div class="form-group row no-gutters align-items-center col-4">
                    <label for="dateB" class="col-12 cold-md-auto pr-2">Né : </label>
                    <input type="date" class="col form-control" id="dateB" name="dateB" value="<?= $data['animal']['birth'] ?>">
                </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>Type</th>
                        <th>Sexe</th>
                        <th>Statut</th>
                        <th>Ami Chien</th>
                        <th>Ami Chat</th>
                        <th>Ami Enfant</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>
                            <select name="typeAnimal">

                                <option value="Chat" <?php
                                                        if ($data['animal']['type_animal'] ===  "Chat") echo "selected" ?>>Chat</option>
                                <option value="Chien" <?php
                                                        if ($data['animal']['type_animal'] ===  "Chien") echo "selected" ?>>Chien</option>
                                <option value="Lapin" <?php
                                                        if ($data['animal']['type_animal'] ===  "Lapin") echo "selected" ?>>Lapin</option>
                                <option value="Hamster" <?php
                                                        if ($data['animal']['type_animal'] ===  "Hamster") echo "selected" ?>>Hamster</option>
                            </select>
                        </td>
                        <td>
                            <select name="sex">
                                <option value="Mâle" <?php
                                                        if ($data['animal']['gender'] === "Mâle") echo "selected" ?>>Mâle</option>
                                <option value="Femelle" <?php
                                                        if ($data['animal']['gender'] === "Femelle") echo "selected" ?>>Femelle</option>
                            </select>
                        </td>
                        <td>
                            <select name="status">
                                <?php foreach ($status as $statu) : ?>
                                    <option value="<?= $statu['id_status'] ?>" <?php
                                                                                if ((int)$data['animal']['id_status'] === (int)$statu['id_status']) echo "selected" ?>>
                                        <?= $statu['wording_status'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select name="friendDog">
                                <option value="Non" <?php
                                                    if ($data['animal']['friend_dog'] ===  "Non") echo "selected" ?>>Non</option>
                                <option value="Oui" <?php
                                                    if ($data['animal']['friend_dog'] ===  "Oui") echo "selected" ?>>Oui</option>
                                <option value="N/A" <?php
                                                    if ($data['animal']['friend_dog'] ===  "N/A") echo "selected" ?>>N/A</option>
                            </select>
                        </td>
                        <td>
                            <select name="friendCat">
                                <option value="Non" <?php
                                                    if ($data['animal']['friend_cat'] ===  "Non") echo "selected" ?>>Non</option>
                                <option value="Oui" <?php
                                                    if ($data['animal']['friend_cat'] ===  "Oui") echo "selected" ?>>Oui</option>
                                <option value="N/A" <?php
                                                    if ($data['animal']['friend_cat'] ===  "N/A") echo "selected" ?>>N/A</option>
                            </select>
                        </td>
                        <td>
                            <select name="friendChild">
                                <option value="Non" <?php
                                                    if ($data['animal']['friend_child'] ===  "Non") echo "selected" ?>>Non</option>
                                <option value="Oui" <?php
                                                    if ($data['animal']['friend_child'] ===  "Oui") echo "selected" ?>>Oui</option>
                                <option value="N/A" <?php
                                                    if ($data['animal']['friend_child'] ===  "N/A") echo "selected" ?>>N/A</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>Caractere 1</th>
                        <th>Caractere 2</th>
                        <th>Caractere 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>
                            <select name="character1">
                                <?php foreach ($characters as $character) : ?>
                                    <option value="<?= $character['id_character'] ?>" <?php
                                                                                        if (isset($data['animal']['character1']) && $data['animal']['character1']['id_character'] === $character['id_character']) echo "selected" ?>>
                                        <?= $character['wording_character_m'] ?>
                                    <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select name="character2">
                                <?php foreach ($characters as $character) : ?>
                                    <option value="<?= $character['id_character'] ?>" <?php
                                                                                        if (isset($data['animal']['character2']) && $data['animal']['character2']['id_character'] === $character['id_character']) echo "selected" ?>>
                                        <?= $character['wording_character_m'] ?>
                                    <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select name="character3">
                                <?php foreach ($characters as $character) : ?>
                                    <option value="<?= $character['id_character'] ?>" <?php
                                                                                        if (isset($data['animal']['character3']) && $data['animal']['character3']['id_character'] === $character['id_character']) echo "selected" ?>>
                                        <?= $character['wording_character_m'] ?>
                                    <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5"><?= $data['animal']['description_animal'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="adoptionDesc">Adoption description</label>
                <textarea class="form-control" id="adoptionDesc" name="adoptionDesc" rows="5"><?= $data['animal']['adoption_description_animal'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="localisation">Localisation</label>
                <textarea class="form-control" id="localisation" name="localisation" rows="5"><?= $data['animal']['localisation'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="engagement">Engagement</label>
                <textarea class="form-control" id="engagement" name="engagement" rows="5"><?= $data['animal']['engagement_description_animal'] ?></textarea>
            </div>

            <?php require 'views/back/imagesAnimalManager.view.php' ?>

            <div class="row no-gutters">
                <button type="submit" class="col btn btn-primary">Valider</button>
                <button id="btnDelete" class="btn btn-danger">Supprimer</button>
            </div>

        </form>

        <script src="public/js/deleteAnimal.js"></script>

    <?php } ?>



    <?php
    $contentAdminAction = ob_get_clean();
    ?>