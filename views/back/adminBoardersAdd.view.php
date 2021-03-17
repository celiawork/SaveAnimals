<?php
ob_start();
?>

<h2 class="my_titleH2 text-center mt-5 mb-5 pb-5">Ajouter une animal</h2>

<form class="mx-5" action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="nameAnimal" class="col-12 cold-md-auto pr-2">Nom : </label>
            <input type="text" class="col form-control" id="nameAnimal" name="nameAnimal" required>
        </div>
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="dateB" class="col-12 cold-md-auto pr-2">Né : </label>
            <input type="date" class="col form-control" id="dateB" name="dateB" required>
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
                        <option value="Chat">Chat</option>
                        <option value="Chien">Chien</option>
                        <option value="Lapin">Lapin</option>
                        <option value="Hamster">Hamster</option>
                    </select>
                </td>
                <td>
                    <select name="sex">
                        <option value="Mâle">Mâle</option>
                        <option value="Femelle">Femelle</option>
                    </select>
                </td>
                <td>
                    <select name="status">
                        <?php foreach($status as $statu) : ?>
                            <option value="<?= $statu['id_status'] ?>"><?= $statu['wording_status'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="friendDog">
                        <option value="Non">Non</option>
                        <option value="Oui">Oui</option>
                        <option value="N/A">N/A</option>
                    </select>
                </td>
                <td>
                    <select name="friendCat">
                        <option value="Non">Non</option>
                        <option value="Oui">Oui</option>
                        <option value="N/A">N/A</option>
                    </select>
                </td>
                <td>
                    <select name="friendChild">
                        <option value="Non">Non</option>
                        <option value="Oui">Oui</option>
                        <option value="N/A">N/A</option>
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
                        <?php foreach($characters as $character) : ?>
                            <option value="<?= $character['id_character'] ?>"><?= $character['wording_character_m'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="character2">
                        <?php foreach($characters as $character) : ?>
                            <option value="<?= $character['id_character'] ?>"><?= $character['wording_character_m'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="character3">
                        <?php foreach($characters as $character) : ?>
                            <option value="<?= $character['id_character'] ?>"><?= $character['wording_character_m'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="adoptionDesc">Adoption description</label>
        <textarea class="form-control" id="adoptionDesc" name="adoptionDesc" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="localisation">Localisation</label>
        <textarea class="form-control" id="localisation" name="localisation" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="engagement">Engagement</label>
        <textarea class="form-control" id="engagement" name="engagement" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="imageActu">Image : </label>
        <input type="file" class="form-control-file" name="pictureActu" id="imageActu">
    </div>
    <div class="row no-gutters">
        <button type="submit" class="col btn btn-primary">Valider</button>
    </div>
</form>

<?php
$contentAdminAction = ob_get_clean();
?>