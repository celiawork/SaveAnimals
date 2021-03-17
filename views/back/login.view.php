<?php ob_start();  ?>

<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5">Login</h1>

<div class='m-5'>
    <form action="" method="POST">
        <div class="form-group row no-gutters align-items-center">
            <label for="login" class="col-6 col-md-3 col-lg-2 text-right pr-5">Login : </label>
            <input type="text" class="col-6 cold-md-9 col-lg-10 form-control" id="login" name="login" required />
        </div>
        <div class="form-group row no-gutters align-items-center">
            <label for="password" class="col-6 col-md-3 col-lg-2 text-right pr-5">Mot de passe : </label>
            <input type="password" class="col-6 cold-md-9 col-lg-10 form-control" id="password" name="password" required />
        </div>
        <div class="row no-gutters">
            <input class="my_button d-block mx-auto mt-5" type="submit" value="Valider" class="col btn btn-primary">
        </div>
    </form>
</div>

<?php if ($alert !== '') {
echo messageAlert($alert, ALERT_DANGER);
}?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>