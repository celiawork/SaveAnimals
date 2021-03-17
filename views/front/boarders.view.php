<?php

ob_start();

echo '<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5">' . $titleH1 . '</h1>'; ?>


<div class="row no-gutters">

    <?php foreach ($animals as $animal) : ?>

        <div class="col-12 col-lg-4 text-center">
            <h3><?= $animal['name_animal'] ?></h3>
            <img style="max-height:180px;" src="<?= URL ?>public/sources/images/<?= $animal['image']['url_image'] ?>" alt="<?= $animal['image']['wording_image'] ?>">
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
                <?php foreach ($animal['characters'] as $character) : ?>

                    <span class="badge badge-warning"><?= $animal['gender'] === 'Mâle' ? $character['wording_character_m'] : $character['wording_character_f']  ?>
                    </span>

                <?php endforeach; ?>
            </div>

            <a href="<?= URL ?>animal&idAnimal=<?= $animal['id_animal'] ?>" class="my_button my_buttonSmall mt-4 mb-5 pb-3">Visiter ma page</a>

        </div>

    <?php endforeach; ?>

</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>