<h2 class="my_titleH2 text-center mt-5 mb-5 pb-5">Gestion des images</h2>

<div id='imageOfAnimal'>
    <?php foreach($data['animal']['images'] as $image) : ?>
        <img src='public/sources/images/<?= $image["url_image"] ?>' alt="<?= $image["wording_image"] ?>" style='max-width:100px;' id='<?= $image['id_image'] ?>'/>
    <?php endforeach; ?>
    <input type="hidden" id="imgToDelete" name="imgToDelete" />
</div>
<hr />
<div class='form-group'>
    <label for="nbImage"> Nombre d'image à rajouter : </label>
    <input type="number" name="nbImage" id="nbImage" />
    <div id="imageToAdd"></div>
</div>

<script src="public/js/imageManagerAnimal.js"></script>