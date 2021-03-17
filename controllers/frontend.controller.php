<?php

require_once "models/animal.dao.php";
require_once "models/actuality.dao.php";

function getHomePage()
{

    $title = "Accueil";
    $description = "Lorem Lipsum";
    $news = getLastNews();
    $event = getLastEventOrActions();
    $animals = getAllAnimals();

    foreach ($animals as $key => $animal) {

        $image = getFirstImageAnimal($animal['id_animal']);
        $animals[$key]['image'] = $image;

    }

    require_once "views/front/home.view.php";
}

function getBoardersPage()
{


    $title = "Page des pensionnaires";
    $description = "Lorem Lipsum";
    $error_message = "L'id du statut n'est pas renseigné, vous ne pouvez pas accéder à la page";


    if (isset($_GET['idstatus']) && !empty($_GET['idstatus'])) {
        $idStatus = Security::secureHTML($_GET['idstatus']);

        //Récupérer le statut pour personnaliser le titre de la page
        $animals = getAnimalFromStatus($idStatus);

        if (!empty($animals)) {

            $titleH1 = "";
            if ((int) $idStatus === ID_STATUS_ADOPTION)
                $titleH1 = "A la recherche d'une famille";
            else if ((int) $idStatus === ID_STATUS_ADOPTED)
                $titleH1 = "En famille d'accueil longue durée";
            else if ((int) $idStatus === ID_STATUS_FALD)
                $titleH1 = "Les anciens";

            //Récupérer des propriétés de chaque animal
            foreach ($animals as $key => $animal) {


                $image = getFirstImageAnimal($animal['id_animal']);
                $animals[$key]['image'] = $image;

                $characters =  getAnimalCharacters($animal['id_animal']);
                $animals[$key]['characters'] = $characters;
            }

            require_once "views/front/boarders.view.php";
        } else {

            throw new Exception($error_message);
        }
    } else {

        throw new Exception($error_message);
    }
}



function getAssociationPage()
{

    $title = "Association";
    $description = "Lorem Lipsum";

    require_once "views/front/association/association.view.php";
}

function getPartnersPage()
{

    $title = "Les partenaires";
    $description = "Lorem Lipsum";

    require_once "views/front/association/partner.view.php";
}


function getContactPage()
{

    $title = "Les partenaires";
    $description = "Lorem Lipsum";

    require_once "views/front/contact/contact.view.php";
}


function getDonationPage()
{

    $title = "Les donations";
    $description = "Lorem Lipsum";

    require_once "views/front/contact/donation.view.php";
}


function getMentionPage()
{

    $title = "Les mentions légales";
    $description = "Lorem Lipsum";

    require_once "views/front/contact/mention.view.php";
}


function getTemperaturePage()
{

    $title = "Température";
    $description = "Lorem Lipsum";

    require_once "views/front/articles/temperature.view.php";
}


function getFoodPage()
{

    $title = "L'alimentation'";
    $description = "Lorem Lipsum";

    require_once "views/front/articles/food.view.php";
}


function getInsurancesPage()
{

    $title = "Les assurances";
    $description = "Lorem Lipsum";

    require_once "views/front/articles/insurances.view.php";
}


function getVaccinationPage()
{

    $title = "La vaccination";
    $description = "Lorem Lipsum";

    require_once "views/front/articles/vaccination.view.php";
}


function getSterilizationPage()
{

    $title = "La stérilisation";
    $description = "Lorem Lipsum";

    require_once "views/front/articles/sterilization.view.php";
}

function getAnimalPage()

{

    $error_message = "Cette page n'existe pas";

    if (isset($_GET['idAnimal']) && !empty($_GET['idAnimal'])) {

        $idAnimal = Security::secureHTML($_GET['idAnimal']);
        $animal = getAnimal($idAnimal);
        
     if (!empty($animal)) {

                    $image =  getFirstImageAnimal($idAnimal);
                    $characters = getAnimalCharacters($idAnimal);
                    $title = "La page de l'animal" . $animal['name_animal'];
                    $description = "Lorem Lipsum";
                }else {

                                throw new Exception($error_message);
                            }

                        }else{

                            throw new Exception($error_message);
         
                       }

                       require_once "views/front/animal.view.php";
}



function getActualityPage()
{

    $title = "Actualités";
    $description = "Lorem Lipsum";

    if (isset($_GET['typeActu']) && !empty($_GET['typeActu'])) {
        $typeActu = Security::secureHTML($_GET['typeActu']);

        //Récupérer le statut pour personnaliser le titre de la page

        $actualities = getActualities($typeActu);

        $titleH1 = "";
        if ((int)$typeActu === TYPE_ACTU_NEWS)
            $titleH1 = "Nouvelles des adoptés";
        else if ((int)$typeActu === TYPE_ACTU_EVENT)
            $titleH1 = "Evénements";
        else if ((int)$typeActu === TYPE_ACTU_ACTION)
            $titleH1 = "Nos actions";
      

        foreach ($actualities as $key => $actuality) {

            $image_actuality = getImageActuality($actuality['id_image']);
            $actualities[$key]['image'] = $image_actuality;
        }
    }

    require_once "views/front/actuality/actuality.view.php";
}
