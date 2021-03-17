<?php
ob_start();
?>

<div class="row no-gutters">
    <div class="col-lg-7 px-5">
        <h1 class="my_titleH1  text-center my-5">Contact</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam tristique blandit dictum.</p>

        <form method="POST" action="#">
            <div class="form-group row no-gutters mb-4">
                <label class="col-auto" for="object"></label>
                <select type="text" name="object" id="object" class="col form-control" required>
                    <option value="Questions">Questions</option>
                    <option value="Adoptions">Adoptions</option>
                    <option value="Donation">Donation</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>

            <div class="form-group row no-gutters mb-4">
                <label class="col-auto" for="name"></label>
                <input type="text" name="name" id="name" placeholder="Nom" class="form-control" required>
            </div>

            <div class="form-group row no-gutters mb-4">
                <label class="col-auto" for="name"></label>
                <input type="email" name="mail" id="mail" placeholder="Adresse e-mail" class="form-control" required>
            </div>

            <div class="form-group no-gutters mb-4">
                <label for="message">Message :</label>
                <textarea type="email" name="message" id="message" rows="3" class="col form-control" required></textarea>
            </div>

            <div class="row">
                <div class="col-3 form-group no-gutters mb-4">
                    <label class="textCaptcha" for="captcha">Combien font 3 + 5 ?</label>
                    <input style="width:40px" type="number" name="captcha" id="captcha" class="col form-control" required>
                </div>
            </div>
            <!--EndSectionCaptcha -->

            <input class="my_button my_buttonSmall d-block mx-auto px-5 my-5" type="submit" value="Valider">

        </form>
    </div><!-- EndLeftSection -->
    <div class="my_shadowContact col bg-dark row align-items-center no-gutters my_shadow">

        <div class="my_SectionInfo ml-5 my-5">

            <div class="d-flex flex-row mb-5">
                <img class="iconeContact " src="<?= URL ?>public/sources/images/others/icones/mail.svg">
                <p class="mt-3 ml-5 text-light">xxxxxxxxxxxxx@xxxxxxx.com</p>
            </div>
            <div class="d-flex flex-row mb-5">
                <img class="iconeContact" src="<?= URL ?>public/sources/images/others/icones/phone-call.svg">
                <p class="mt-3 ml-5 text-light">01 02 10 12 04 18</p>
            </div>
            <div class="d-flex flex-row mb-5">
                <img class="iconeContact" src="<?= URL ?>public/sources/images/others/icones/address.svg">
                <p class="mt-3 ml-5 text-light"> 18 rue de Itsum 00000 Lorem</p>
            </div>
            <div class="d-flex flex-row">
                <img class="iconeContact" src="<?= URL ?>public/sources/images/others/icones/clock.svg">
                <p class="mt-3 ml-5 text-light">10h00 - 17h00 </p>
            </div>

        </div>

    </div><!-- EndRightSection -->
</div><!-- Endrow -->


<?php

if (
    isset($_POST['object']) && !empty($_POST['object']) &&
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['mail']) && !empty($_POST['mail']) &&
    isset($_POST['message']) && !empty($_POST['message']) &&
    isset($_POST['captcha']) && !empty($_POST['captcha'])
) {

    $captcha = (int) $_POST['captcha'];
    if ($captcha === 8) {
        $object = htmlentities($_POST['object']);
        $name = htmlentities($_POST['name']);
        $mail = htmlentities($_POST['mail']);
        $message = htmlentities($_POST['message']);
        $recipient = "celiawork@outlook.fr";

        mail($recipient, $object . "-" . $name, "Mail :" . $mail . "Message :" . $message);

        echo '<div class="alert alert-success" role="alert">';
        echo   'Votre message a bien été envoyé !';
        echo    '</div>';
    } else {

        echo '<div class="alert alert-danger" role="alert">';
        echo   'Erreur de calcul !!';
        echo    '</div>';
    }
}
?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>