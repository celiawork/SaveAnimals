<?php
ob_start();
?>

<h2 class="my_titleH2 text-center mt-5 mb-5 pb-5">Modifier une news</h2>
<h3 class="my_titleH3 text-center mt-5 mb-5 pb-5">Choix : </h3>

<form class="mx-5" method="POST" action="" enctype="multipart/form-data">
  <input type="hidden" name="step" value="2">


  <label for="typeActu">Type d'actualité</label>
  <select class="form-control" id="typeActu" name="typeActu" onchange="submit()">
    <option></option>
    <?php foreach ($typesActuality as $typeActuality) : ?>
      <option value="<?= $typeActuality['id_type_actuality'] ?>" <?php
                                                                  if (isset($_POST['typeActu']) && $_POST['typeActu'] ===  $typeActuality['id_type_actuality']) echo "selected" ?>>
        <?= $typeActuality["wording_type_actuality"] ?>
      </option>
    <?php endforeach ?>
  </select>

</form>

<?php if (isset($_POST['typeActu']) && (int)$_POST['step'] >= 2) { ?>

  <form class="mx-5" method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="step" value="3">
    <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>">

    <label for="actualities">Actualité</label>
    <select class="form-control" id="actualities" name="actualities" onchange="submit()">
      <option></option>

      <?php foreach ($data['actualities'] as $actuality) : ?>
        <option value="<?= $actuality['id_actuality'] ?>" <?php
                                                          if (isset($_POST['actualities']) && $_POST['actualities'] ===  $actuality['id_actuality']) echo "selected" ?>>
          <?= $actuality['id_actuality'] . '-' . $actuality['wording_actuality'] ?>
        </option>
      <?php endforeach ?>
    </select>

  </form>
<?php } ?>



<?php if (isset($_POST["step"]) && (int)$_POST['step'] >= 3) { ?>

  <h3 class="my_titleH3 text-center mt-5 mb-5 pb-5">Les informations </h3>

  <form class="mx-5" method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="step" value="4">
    <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>">
    <input type="hidden" name="actualities" value="<?= $_POST['actualities'] ?>">
    <div class="form-group">
      <label for="titleActu">Titre de l'actualité</label>
      <input type="text" class="form-control" id="titleActu" name="titleActu" value="<?= $data['actuality']['wording_actuality'] ?>">
    </div>
    <div class="form-group">
      <label for="typeActu">Type d'actualité</label>
      <select class="form-control" id="typeActu" name="typeActu" required>

        <?php foreach ($typesActuality as $typeActuality) : ?>
          <option value="<?= $typeActuality['id_type_actuality'] ?>" <?php
                                                                      if ($data['actuality']['id_type_actuality'] ===  $typeActuality['id_type_actuality']) echo "selected" ?>>
            <?= $typeActuality['wording_type_actuality'] ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="contentActu">Contenu du texte</label>
      <textarea type="text" class="form-control" id="contentActu" name="contentActu" rows="5"><?= $data['actuality']['content_actuality'] ?></textarea>
    </div>

    <div class="form-group">
      <label for="pictureActu">Image</label>
      <img style='width:200px' src="public/sources/images/<?= $data['actuality']['url_image'] ?>">
      <input type="file" class="form-control-file" id="pictureActu" name="pictureActu">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
    <button id="btnDelete" class="btn btn-danger">Supprimer</button>
  </form>

  <script src="public/js/deleteActu.js"></script>
  
<?php } ?>



<?php
$contentAdminAction = ob_get_clean();
?>