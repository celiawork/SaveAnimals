<?php
ob_start();
?>

<div class="my_sectionIndexTitle row mx-5">

    <div class="my_sectionTitleLeft col-lg-5 mx-auto mt-5">
        <h1 class="my_titleH1 ml-5 mt-5">Lorem ipsum dolor sit amet.</h1>
        <p class="ml-5">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni sed cumque dolores optio ab soluta quasi vel minus expedita deserunt.
        </p>

        <a href="<?= URL ?>pensionnaires&idstatus=<?= ID_STATUS_ADOPTION ?>" class="my_button ml-5 my-5">Découvrir nos amis</a>
    </div>

    <div class="my_sectionTitleRight col-lg-7 mx-auto ">
        <img class="imgDogIndex img-fluid mt-5 float-right" src="<?= URL ?>public/sources/images/animals/dogHome.png" alt="Chien">
    </div>
</div>

<!--Images Animals -->
<!-- Carousel -->
<div class="container-carousel">
    <div class="swiper-container my-5">
        <div class="swiper-wrapper">
            <?php foreach ($animals as $animal) : ?>
                <div class="swiper-slide img-fluid my-5" style="height:200px;width:300px;background-image:url(public/sources/images/<?= $animal['image']['url_image'] ?>" alt="<?= $animal['image']['wording_image']?>"></div>
            <?php endforeach; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- Section news and events -->
<div class="my_section_news row mb-5 mx-5 align-items-center">

    <!-- NEWS -->
    <div class="col-lg-6 mt-5 mb-5">
        <h2 class="my_titleH2 text-center">
            <img class="mr-3 img-fluid" src="public/sources/images/others/icones/newspaper.svg" alt="icone journal" style="width: 50px;">
            Des nouvelles !
        </h2>
        <div class="row mt-5">
            <div class="col-6">
                <img class="img-fluid" style="width: 250px;" src="public/sources/images/<?= $news['url_image'] ?> ">
            </div>
            <div class="col-6">
                <h3><?= $news['wording_actuality'] ?></h3>
                <article class="mt-4">
                    <?= textCut(nl2br($news['content_actuality'])) ?>
                </article>
                <a href="<?= URL ?>actualite&typeActu=<?= TYPE_ACTU_NEWS ?>" class="my_button mt-3 my_buttonSmall" style="width: 100;">Voir</a>
            </div>
        </div>
    </div>

    <!-- EVENTS -->
    <div class="col-lg-6 mt-5 mb-5">
        <h2 class="my_titleH2 text-center">
            <img class="mr-3 img-fluid" src="public/sources/images/others/icones/megaphone.svg" alt="icone megaphone" style="width: 50px;">
            Evènements
        </h2>
        <div class="row mt-5">
            <div class="col-6">
                <img class="img-fluid" style="width: 250px;" src="public/sources/images/<?= $event['url_image'] ?>">
            </div>
            <div class="col-6">
                <h3><?= $event['wording_actuality'] ?></h3>
                <article class="mt-4">
                    <?= textCut(($event['content_actuality']), 5) ?>
                </article>
                <a href="<?= URL ?>actualite&typeActu=<?= TYPE_ACTU_EVENT ?>" class="my_button mt-3 my_buttonSmall" style="width: 100;">Voir</a>
            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>