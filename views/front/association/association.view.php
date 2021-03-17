
<?php
ob_start();
?>

<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5">Association SaveAnimals</h1>
<h2 class="text-center mt-5">Qui sommes-nous ?</h2>
<div class="my_borderBottom mt-4 mb-5"></div>

<div>
<img style="width: 500;" class="rounded mx-auto d-block mt-5 img-fluid" src="public/sources/images/others/personal.jpg">
</div>

<div class="my_backgroundGrey"></div>



<?php 
$content = ob_get_clean();
require "views/commons/template.php"
?>