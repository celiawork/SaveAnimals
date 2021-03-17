<?php ob_start();  ?>

<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5">Administrateur</h1>

<div class="row no-gutters mx-5">
    <div class="col text-center">
        <a href="genererPensionnairesAdmin" class="btn btn-primary">Gestion des pensionnaires</a>
    </div>
    <div class="col text-center">
        <a href="genererNewsAdmin" class="btn btn-primary">Gestion des news</a>
    </div>
    <div class="col text-center">
        <form action="" method="POST">
        <input type="hidden" name="deconnexion" value="true">
        <input type="submit" class="btn btn-primary" value="se déconnecter">
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>