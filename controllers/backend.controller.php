<?php

require_once "models/animal.dao.php";
require_once "models/actuality.dao.php";
require_once "models/admin.dao.php";
require_once "models/image.dao.php";
require_once "config/config.php";
require_once "public/useful/formatting.php";
require_once "public/useful/manageImages.php";





function getLoginPage()
{
    $title = "Page de login du site";
    $description = "Page de login";
    $alert = "";

    if (Security::verificationAccess()) {

        header("Location: admin");
    }

    if (
        isset($_POST['login']) && !empty($_POST['login']) &&
        isset($_POST['password']) && !empty($_POST['password'])
    ) {
        $login = Security::secureHTML($_POST['login']);
        $password = Security::secureHTML($_POST['password']);
        if (!getPasswordUser($login)) {

            $alert = "Mot de passe ou identifiant invalide";
        } else {

            if (isConnexionValid($login, $password)) {

                $_SESSION['acces'] = "admin";
                Security::genercookiePassword();
                header("Location: admin");
            } else {

                $alert = "Mot de passe ou identifiant invalide";
            }
        }
    }

    require_once "views/back/login.view.php";
}

function getAdminPage()
{
    if (isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true") {

        session_destroy();
        header("Location: accueil");
    }

    if (Security::verificationAccess()) {
        Security::genercookiePassword();
        $title = "Administration";
        $description = "Page d'administrations";

        require_once "views/back/admin.view.php";
    } else {

        throw new Exception("Vous n'avez pas le droit d'avoir accès a cette page");
    }
}

function getAdminBoardersPage($require = "", $alert = "", $alertType = "", $data = "")
{

    if (Security::verificationAccess()) {
        Security::genercookiePassword();
        $title = "Administration";
        $description = "Page d'administration des pensionnaires";
        $status = getListStatusAnimal();
        $characters = getListCharactersAnimal();

        $contentAdminAction = "";
        if ($require !== "") require_once $require;
        require_once "views/back/adminBoarders.view.php";
    } else {

        throw new Exception("Vous n'avez pas le droit d'avoir accès a cette page");
    }
}

function getAdminBoardersAddPage()
{
    $alert = "";
    $alertType = 0;

    if (
        isset($_POST['nameAnimal']) && !empty($_POST['nameAnimal']) &&
        isset($_POST['dateB']) && !empty($_POST['dateB'])

    ) {

        $nameAnimal = Security::secureHTML($_POST['nameAnimal']);
        $dateB = Security::secureHTML($_POST['dateB']);
        $type = Security::secureHTML($_POST['typeAnimal']);
        $sex = Security::secureHTML($_POST['sex']);
        $status = Security::secureHTML($_POST['status']);
        $dateAdoption = "";
        if ($status != ID_STATUS_ADOPTED) {
            $dateAdoption = date("Y-m-d H:i:s", time());
        }
        $friendDog = Security::secureHTML($_POST['friendDog']);
        $friendCat = Security::secureHTML($_POST['friendCat']);
        $friendChild = Security::secureHTML($_POST['friendChild']);
        $description = Security::secureHTML($_POST['description']);
        $adoptionDesc = Security::secureHTML($_POST['adoptionDesc']);
        $localisation = Security::secureHTML($_POST['localisation']);
        $engagement = Security::secureHTML($_POST['engagement']);
        $character1 = Security::secureHTML($_POST['character1']);
        $character2 = Security::secureHTML($_POST['character2']);
        $character3 = Security::secureHTML($_POST['character3']);

        $fileImage = $_FILES['pictureActu'];
        $repository = "public/sources/images/animals/";


        try {

            $nameImage = UploadImage($fileImage, $repository, $nameAnimal);
            $idImage = insertImageIntoBD($nameAnimal, "animals/" . $nameImage);
            $idAnimal = insertAnimalIntoBD($nameAnimal, $type, $sex, $dateB, $friendDog, $friendCat, $friendChild, $description, $adoptionDesc, $localisation, $engagement, $status);


            if ($idAnimal > 0) {

                insertIntoBD_Animal_Image($idAnimal, $idImage);
                insertIntoBD_Character_Animal($character1, $idAnimal);

                if ($character2 !== $character1) {

                    insertIntoBD_Character_Animal($character2, $idAnimal);
                }
                if ($character3 !== $character2 && $character3 !== $character1) {

                    insertIntoBD_Character_Animal($character3, $idAnimal);
                }

                $alert = "La création de l'animal est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {

                $alert = 'Il y a une erreur';
                $alertType = ALERT_DANGER;
            }
        } catch (Exception $e) {

            $alert = "La création de l'animal n'a pas fonctionnée <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }


    getAdminBoardersPage("views/back/adminBoardersAdd.view.php", $alert, $alertType);
}

function getAdminBoardersModifPage()
{
    $alert = "";
    $alertType = 0;
    $data = [];

    if (isset($_POST["step"]) && (int)$_POST["step"] >= 3) {

        $idStatus = Security::secureHTML($_POST['status']);
        $typeAnimal = Security::secureHTML($_POST['typeAnimal']);
        $data['animals'] = getAnimalFromTypeAndStatus($idStatus, $typeAnimal);
    }
    if (isset($_POST["step"]) && (int)$_POST["step"] >= 4) {

        $idAnimal = Security::secureHTML($_POST['animal']);
        $data['animal'] = getAnimal((int)$idAnimal);
        $characters = getAnimalCharacters((int)$idAnimal);
        if (count($characters) > 0) $data['animal']['character1'] = $characters[0];
        if (count($characters) > 1) $data['animal']['character2'] = $characters[1];
        if (count($characters) > 2) $data['animal']['character3'] = $characters[2];

        $data['animal']['images'] = getAnimalImages($idAnimal);
    }

    if (isset($_POST["step"]) && (int)$_POST["step"] >= 5) {

        $idAnimal = $data['animal']['id_animal'];
        $nameAnimal = Security::secureHTML($_POST['nameAnimal']);
        $dateB = Security::secureHTML($_POST['dateB']);
        $typeEnter = Security::secureHTML($_POST['typeAnimal']);
        $sex = Security::secureHTML($_POST['sex']);
        $status = Security::secureHTML($_POST['status']);
        $dateAdoption = "";
        if ($status != ID_STATUS_ADOPTED) {
            $dateAdoption = date("Y-m-d H:i:s", time());
        }
        $friendDog = Security::secureHTML($_POST['friendDog']);
        $friendCat = Security::secureHTML($_POST['friendCat']);
        $friendChild = Security::secureHTML($_POST['friendChild']);
        $description = Security::secureHTML($_POST['description']);
        $adoptionDesc = Security::secureHTML($_POST['adoptionDesc']);
        $localisation = Security::secureHTML($_POST['localisation']);
        $engagement = Security::secureHTML($_POST['engagement']);
        $character1 = Security::secureHTML($_POST['character1']);
        $character2 = Security::secureHTML($_POST['character2']);
        $character3 = Security::secureHTML($_POST['character3']);

        $imagesToDel = Security::secureHTML($_POST['imgToDelete']);
        $nbImageToAdd = Security::secureHTML($_POST['nbImage']);


        try {

            $idImagesSplited = explode("-", $imagesToDel);

            for ($i = 0; $i < count($idImagesSplited); $i++) {

                deleteImagesFromAnimal($idImagesSplited[$i], $idAnimal);
            }

            if ($nbImageToAdd > 0) {
                $repository = "public/sources/images/animals/";
                for ($i = 0; $i < $nbImageToAdd; $i++) {

                    $fileImage = $_FILES['image' . $i];
                    if ($_FILES['image' . $i]['size'] > 0) {
                        $nameImage = UploadImage($fileImage, $repository, $nameAnimal);
                        $idImage = insertImageIntoBD($nameAnimal, "animals/" . $nameImage);
                        insertIntoBD_Animal_Image($idAnimal, $idImage);
                    }
                }
            }


            if (updateAnimalIntoBD($idAnimal, $nameAnimal, $dateB, $typeEnter, $sex, $dateAdoption, $friendDog, $friendCat, $friendChild, $description, $adoptionDesc, $localisation, $engagement, $status)) {

                deleteCharacterAnimalIntoBD($idAnimal);
                insertIntoBD_Character_Animal($character1, $idAnimal);

                if ($character2 !== $character1) {

                    insertIntoBD_Character_Animal($character2, $idAnimal);
                }
                if ($character3 !== $character2 && $character3 !== $character1) {

                    insertIntoBD_Character_Animal($character3, $idAnimal);
                }


                $alert = "La modification de l'animal est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {

                $alert = 'Il y a une erreur de BD';
                $alertType = ALERT_DANGER;
            }
        } catch (Exception $e) {

            $alert = "La modification de l'animal n'a pas fonctionnée <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }

        $data['animal'] = getAnimal((int)$idAnimal);
        $characters = getAnimalCharacters((int)$idAnimal);
        if (count($characters) > 0) $data['animal']['character1'] = $characters[0];
        if (count($characters) > 1) $data['animal']['character2'] = $characters[1];
        if (count($characters) > 2) $data['animal']['character3'] = $characters[2];
        $data['animal']['images'] = getAnimalImages($idAnimal);
    }

    getAdminBoardersPage("views/back/adminBoardersModif.view.php", $alert, $alertType, $data);
}

function getAdminBoardersDeletePage()
{
    $alert = "";
    $alertType = 0;

    if (isset($_GET['sup'])) {

        try {

            if (deleteAnimalFromBD(Security::secureHTML($_GET['sup'])) < 1) {

                throw new Exception("La suppression n'a pas fonctionné en base de donnée");
            }

            $alert = "La suppresion de l'animal a fonctionné";
            $alertType = ALERT_SUCCESS;
        } catch (Exception $e) {

            $alert = "La suppression de l'animal n'a pas fonctionné <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }

    getAdminBoardersPage("", $alert, $alertType);
}


function getAdminActuPage($require = "", $alert = "", $alertType = "", $data = "")
{

    if (Security::verificationAccess()) {
        Security::generCookiePassword();
        $title = "Page de gestion des news";
        $description = "Page de gestion des news";

        $typesActuality = getTypesActuality();
        $imageBD = getAllImagesFromBD();

        $contentAdminAction = "";
        if ($require !== "") require_once $require;
        require_once "views/back/adminNews.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function getAdminActuAddPage()
{
    $alert = "";
    $alertType = "";
    if (
        isset($_POST['titleNews']) && !empty($_POST['titleNews']) &&
        isset($_POST['typeActu']) && !empty($_POST['typeActu']) &&
        isset($_POST['contenuActu']) && !empty($_POST['contenuActu'])
    ) {
        $alertType = 0;
        $titleNews = Security::secureHTML($_POST['titleNews']);
        $typeActu = Security::secureHTML($_POST['typeActu']);
        $contenuActu = Security::secureHTML($_POST['contenuActu']);
        $fileImage = $_FILES['imageActu'];
        $repertoire = "public/sources/images/news/";
        $date = date("Y-m-d H:i:s", time());
        try {
            $nomImage = UploadImage($fileImage, $repertoire, $titleNews);
            $idImage = insertImageIntoBD($nomImage, "news/" . $nomImage);

            if (insertActualiteIntoBD($titleNews, $typeActu, $contenuActu, $date, $idImage)) {
                $alert = "La création de l'actualité est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
                throw new Exception("L'insertion en BD n'a pas fonctionné");
            }
        } catch (Exception $e) {
            $alert = "La création de l'actualité n'a pas fonctionnée <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }

    getAdminActuPage("views/back/adminNewsAdd.view.php", $alert, $alertType);
}

function getAdminActuModifPage()
{
    $alert = "";
    $alertType = 0;
    $data = [];

    if (isset($_POST["step"]) && (int)$_POST['step'] >= 2) {

        $typeActu = Security::secureHTML($_POST['typeActu']);
        $data['actualities'] = getActualities((int)$typeActu);
    }
    if (isset($_POST["step"]) && (int)$_POST['step'] >= 3) {

        $actuality = Security::secureHTML($_POST["actualities"]);
        $data['actuality'] = getActuality((int)$actuality);
    }
    if (isset($_POST["step"]) && (int)$_POST['step'] >= 4) {

        $titleActu = Security::secureHTML($_POST['titleActu']);
        $typeActu = Security::secureHTML($_POST['typeActu']);
        $contentActu = Security::secureHTML($_POST['contentActu']);
        $idImage = $data['actuality']['id_image'];
        $idActuality = $data['actuality']['id_actuality'];

        try {

            if ($_FILES['pictureActu']['size'] > 0) {

                $fileImage = $_FILES['pictureActu'];
                $repository = "public/sources/images/news/";
                $nameImage = UploadImage($fileImage, $repository, $titleActu);
                $idImage = insertImageIntoBD($titleActu, "news/" . $nameImage);
            }

            if (updateActuIntoBD($idActuality, $titleActu, $contentActu, $typeActu, $idImage)) {

                $alert = "La modification de l'actualité est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {

                $alert = 'Il y a une erreur de BD';
                $alertType = ALERT_DANGER;
            }
        } catch (Exception $e) {

            $alert = "La modification de l'actualité n'a pas fonctionnée <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }

        $data['actualities'] = getActualities((int)$typeActu);
        $data['actuality'] = getActuality((int)$actuality);
    }

    getAdminActuPage("views/back/adminNewsModif.view.php", $alert, $alertType, $data);
}


function getAdminActuDeletePage()
{
    $alert = "";
    $alertType = 0;

    if (isset($_GET['sup'])) {

        try {

            deleteActuFromBD(Security::secureHTML($_GET['sup']));

            $alert = "La suppresion a fonctionné";
            $alertType = ALERT_SUCCESS;
        } catch (Exception $e) {

            $alert = "La suppression de l'actualité n'a pas fonctionné <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }

    getAdminActuPage("", $alert, $alertType);
}
