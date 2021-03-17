<?php
ob_start();
?>

<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5">Gestion des pensionnaires</h1>

<a href="genererPensionnairesAdminAjouter">Ajouter</a>
<a href="genererPensionnairesAdminModif">Modifier</a>


<?= $contentAdminAction ?>

<?php if ($alert !== '') {

  echo messageAlert($alert, $alertType);
} ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
