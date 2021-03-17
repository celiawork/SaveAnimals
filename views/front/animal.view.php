<?php
ob_start();
?>

<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5"><?= $animal['name_animal'] ?></h1>

<div class="row my-5 mx-5 align-items-center">
    <div class="col-lg-6">
        <div class="text-center">
            <img style="width: 400" src="<?= URL ?>public/sources/images/<?= $image['url_image'] ?>" alt="<?= $image['wording_image'] ?>">

            <p class="mt-3"><?= $animal['gender'] ?></p>
            <?php

            $iconeDog = "";
            if ($animal['friend_dog'] === 'oui') $iconeDog = 'dogOK';
            else if ($animal['friend_dog'] === 'non') $iconeDog = 'dogNoOK';
            else if ($animal['friend_dog'] === 'N/A') $iconeDog = 'nothing';

            $iconeCat = "";
            if ($animal['friend_cat'] === 'oui') $iconeCat = 'catOK';
            else if ($animal['friend_cat'] === 'non') $iconeCat = 'catNoOK';
            else if ($animal['friend_cat'] === 'N/A') $iconeCat = 'nothing';

            $iconeBaby = "";
            if ($animal['friend_child'] === 'oui') $iconeBaby = 'babyOK';
            else if ($animal['friend_child'] === 'non') $iconeBaby = 'babyNoOK';
            else if ($animal['friend_child'] === 'N/A') $iconeBaby = 'nothing';


            ?>

            <div class="mb-4">
                <img src="<?= URL ?>public/sources/images/others/icones/<?= $iconeDog ?>.png">
                <img src="<?= URL ?>public/sources/images/others/icones/<?= $iconeCat ?>.png">
                <img src="<?= URL ?>public/sources/images/others/icones/<?= $iconeBaby ?>.png">
            </div>

            <div>
                <?php foreach ($characters as $character) : ?>
                    <span class="badge badge-warning"><?= $animal['gender'] ==='Mâle' ? $character['wording_character_m'] : $character['wording_character_f']  ?>
                    </span>
                <?php endforeach; ?>
            </div>


        </div>
    </div>

    <div class="col-lg-6">
        <h2>Qui suis-je ?</h2>
        <hr>
        <p class="mt-4 "><?= (nl2br($animal['description_animal'])) ?></p>
        <hr>
    </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>