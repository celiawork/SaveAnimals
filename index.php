<?php
session_start();

require_once "controllers/frontend.controller.php";
require_once "controllers/backend.controller.php";
require_once "public/useful/formatting.php";
require_once "config/Security.class.php";
require_once "config/config.php";


try {

    if (isset($_GET['page']) && !empty($_GET['page'])) {

        $page = Security::secureHTML($_GET['page']);


        switch ($page) {

            case 'accueil':
                getHomePage();
                break;
            case 'pensionnaires':
                getBoardersPage();
                break;
            case 'partenaires':
                getPartnersPage();
                break;
            case 'association':
                getAssociationPage();
                break;
            case 'contact':
                getContactPage();
                break;
            case 'don':
                getDonationPage();
                break;
            case 'mention_legales':
                getMentionPage();
                break;
            case 'temperature':
                getTemperaturePage();
                break;
            case 'alimentation':
                getFoodPage();
                break;
            case 'Assurances_animaux':
                getInsurancesPage();
                break;
            case 'vacinations':
                getVaccinationPage();
                break;
            case 'sterilisation':
                getSterilizationPage();
                break;
            case 'animal':
                getAnimalPage();
                break;
            case 'actualite';
                getActualityPage();
                break;
            case 'login';
                getLoginPage();
                break;
                case 'admin';
                getAdminPage();
                break;
                case 'genererPensionnairesAdmin';
                getAdminBoardersPage();
                break;
                case 'genererPensionnairesAdminAjouter';
                getAdminBoardersAddPage();
                break;
                case 'genererPensionnairesAdminModif';
                getAdminBoardersModifPage();
                break;
                case 'genererPensionnairesAdminSupp';
                getAdminBoardersDeletePage();
                case 'genererNewsAdmin';
                getAdminActuPage();
                break;
                case 'genererNewsAdminAjouter';
                getAdminActuAddPage();
                break;
                case 'genererNewsAdminModif';
                getAdminActuModifPage();
                break;
                case 'genererNewsAdminSupp';
                getAdminActuDeletePage();
                break;
            case 'error301':
            case 'error302':
            case 'error400':
            case 'error401':
            case 'error402':
            case 'error405':
            case 'error500':
            case 'error505':
                throw new Exception("Erreur 505");
                break;
            case 'error403':
                throw new Exception("Vous n'avez pas l'autoristation d'accèder à cette page.");
                break;
            case 'error404':
            default:
                throw new Exception("La page n'existe pas");
        }
    } else {

        getHomePage();
    }
} catch (Exception $e) {


    $title = 'Erreur';
    $description = 'Page de gestion des erreurs';

    $error_message = $e->getMessage();

    require "views/commons/error.view.php";
}
