<nav class="navbar navbar-expand-lg navbar-light bg-light font-weight-bold">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Association
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= URL ?>association">Qui sommes-nous ?</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= URL ?>partenaires">Partenaires</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?= URL ?>global/boarders.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pensionnaires
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= URL ?>pensionnaires&idstatus=<?= ID_STATUS_ADOPTION ?>">A la recherche d'une famille</a>
          <a class="dropdown-item" href="<?= URL ?>pensionnaires&idstatus=<?= ID_STATUS_ADOPTED ?>">Famille d'accueil longue durée</a>
          <a class="dropdown-item" href="<?= URL ?>pensionnaires&idstatus=<?= ID_STATUS_FALD ?>">Les anciens</a>
          <?php
          if (Security::verifAccessSession()) {?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item my_colorTextAdminMenu font-weight-bold" href="<?= URL ?>genererPensionnairesAdmin">Gestion des pensionnaires</a>
          <?php } ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Actualités
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= URL ?>actualite&typeActu=<?= TYPE_ACTU_NEWS ?>">Nouvelles des adoptés</a>
          <a class="dropdown-item" href="<?= URL ?>actualite&typeActu=<?= TYPE_ACTU_EVENT ?>">Evénements</a>
          <a class="dropdown-item" href="<?= URL ?>actualite&typeActu=<?= TYPE_ACTU_ACTION ?>">Nos actions</a>
          <?php 
          if (Security::verifAccessSession()) {?>
        <div class="dropdown-divider"></div>
            <a class="dropdown-item my_colorTextAdminMenu font-weight-bold" href="<?= URL ?>genererNewsAdmin">Gestion des news</a>
         <?php } ?>
      
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Conseils
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= URL ?>temperature">Température</a>
          <a class="dropdown-item" href="<?= URL ?>alimentation">Alimentation</a>
          <a class="dropdown-item" href="<?= URL ?>Assurances_animaux">Assurances animaux</a>
          <a class="dropdown-item" href="<?= URL ?>vacinations">Vaccinations</a>
          <a class="dropdown-item" href="<?= URL ?>sterilisation">Stérilisation</a>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Contact
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= URL ?>contact">Contact</a>
          <a class="dropdown-item" href="<?= URL ?>don">Don</a>
          <a class="dropdown-item" href="<?= URL ?>mention_legales">Mention légales</a>
  </div>
  </li>
  <li class="nav-item">
        <a class="nav-link" href="login">Login</a>
      </li>
  </ul>
  </div>
</nav>