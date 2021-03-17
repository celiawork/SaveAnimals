<h3 class="my_titleH2 text-center mt-5 mb-5 pb-5">Gestion des images</h3>

<div class="row mb-5 py-5 align-items-center border border-dark">
    <div class="col" class="form-group">
        <label for="imageActu">Image</label>
        <input type="file" class="form-control-file" id="imageActu" name="imageActu">
    </div>
    <div class="col" class="form-group">
        <button id="multimedia" class="btn btn-warning">Images du site</button>
        <div id="resultImages" class=""></div>
    </div>
</div>

<div id="imageManager" class="d-none">
    <h4 class="my_titleH2 text-center mt-5 mb-3 pb-5">Bibliothèque</h4>
    <div class="row align-items-center">
        <?php foreach ($imageBD as $image) :?>
            <div id="<?= $image['id_image'] ?>" class="mr-5 mb-5 ">
                <img class="img-fluid" src='public/sources/images/<?= $image["url_image"] ?>' alt="<?= $image["wording_image"] ?>" style='max-width:100px;' id='<?= $image['id_image'] ?>' />
            </div>
        <?php endforeach; ?>
        <button id="validateImage" class="mb-5 btn btn-success col-12">Confirmer les images sélectionnées</button>
    </div>
</div> 



<script src="public/js/imageManagerNews.js"></script>

