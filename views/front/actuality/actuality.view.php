<?php
ob_start();

echo '<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5">' .$titleH1. '</h1>'; ?>


<?php foreach ($actualities as $actuality) : ?>

    <h2 class="border-bottom pb-3 mx-5"><?=$actuality['wording_actuality']?><span class="my_date"><?= date("d/m/Y", strtotime($actuality['date_publication_actuality']))?></span></h2>

    <div class="row mx-5 my-5">
        <div class="col-lg-6">
            <img class="img-fluid mb-5" style="width:400" src="<?= URL ?>public/sources/images/<?= $actuality['image']['url_image'] ?>" alt="<?= $actuality['image']['wording_image'] ?>">
        </div>
        <div class="col-lg-6">
            <p><?= $actuality['content_actuality'] ?></p>
        </div>
    </div>

<?php endforeach ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>