<?php

ob_start();

?>

<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5">Erreur</h1>

<p class="text-center alert alert-danger" role="alert"><?= $error_message ?></p>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>