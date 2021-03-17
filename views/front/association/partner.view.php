<?php
ob_start();
?>

<h1 class="my_titleH1 text-center mt-5 mb-5 pb-5">Nos partenaires</h1>

<div class="row justify-content-center mt-5">

<!-- PARTENAIRE 1 -->
<div class="flip-card mt-5">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="public/sources/images/others/partner1.png" alt="Partenaire 1" style="width: 200px">
    </div>
    <div class="flip-card-back">
      <h2 class="mt-5">Lorem</h2>
      <p>Lorem, ipsum dolor.</p>
      <p>Lorem ipsum dolor sit.</p>
    </div>
  </div>
</div>

<!-- PARTENAIRE 2 -->
<div class="flip-card mt-5">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="public/sources/images/others/partner2.png" alt="Partenaire 2" style="width: 200px">
    </div>
    <div class="flip-card-back">
      <h2 class="mt-5">Lorem</h2>
      <p>Lorem, ipsum dolor.</p>
      <p>Lorem ipsum dolor sit.</p>
    </div>
  </div>
</div>

<!-- PARTENAIRE 3 -->
<div class="flip-card mt-5">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="public/sources/images/others/partner3.png" alt="Partenaire 3" style="width: 200px">
    </div>
    <div class="flip-card-back">
      <h2 class="mt-5">Lorem</h2>
      <p>Lorem, ipsum dolor.</p>
      <p>Lorem ipsum dolor sit.</p>
    </div>
  </div>
</div>

</div>

<?php 
$content = ob_get_clean();
require "views/commons/template.php"
?>