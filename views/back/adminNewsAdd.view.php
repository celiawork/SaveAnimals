<?php
ob_start();
?>

<h2 class="my_titleH2 text-center mt-5 mb-5 pb-5">Ajouter une news</h2>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-6">
            <label for="titleNews">Titre de l'actualité : </label>
            <input type="text" class="form-control" name="titleNews" id="titleNews" required>
        </div>
        <div class="form-group col-6">
            <label for="typeActu">Type d'actualité : </label>
            <select name="typeActu" id="typeActu" class="form-control">
                <?php foreach ($typesActuality as $typeActuality) : ?>
                    <option value="<?= $typeActuality['id_type_actuality'] ?>"><?= $typeActuality['wording_type_actuality'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="contenuActu">Contenu de l'actualité : </label>
        <textarea class="form-control" id="contenuActu" name="contenuActu" rows="5" required></textarea>
    </div>


    <?php require 'imagesNewsManager.view.php' ?>
    <div class="row no-guters">
        <input type="submit" value="Valider" class="btn btn-primary col">
    </div>
</form>




<?php
$contentAdminAction = ob_get_clean();
?>