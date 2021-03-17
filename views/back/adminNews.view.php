<?php
ob_start();
?>

<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5">Gestion des news</h1>

<a href="genererNewsAdminAjouter">Ajouter</a>
<a href="genererNewsAdminModif">Modifier</a>


<?= $contentAdminAction ?>

<?php if ($alert !== '') {

  echo messageAlert($alert, $alertType);
} ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>