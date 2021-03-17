<?php

require_once "pdo.php";

function getActualities($typeActu)

{

    $bdd = connectPDO();

    $stmt = $bdd->prepare('SELECT * 
    FROM actuality
    WHERE id_type_actuality = :typeActu
    order by date_publication_actuality DESC

    ');

    $stmt->bindValue(":typeActu", $typeActu, PDO::PARAM_INT);
    $stmt->execute();

    $actualities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualities;
}

function getActuality($idActuality)

{

    $bdd = connectPDO();

    $req = 'SELECT id_actuality, wording_actuality, content_actuality, id_type_actuality, a.id_image, i.url_image, i.wording_image 
    FROM actuality a
    inner join images i on i.id_image = a.id_image
    WHERE id_actuality = :idActuality
    ';

    $stmt = $bdd->prepare($req);

    $stmt->bindValue(":idActuality", $idActuality, PDO::PARAM_INT);
    $stmt->execute();

    $actuality = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actuality;
}

function getImageActuality($idImage)
{

    $bdd = connectPDO();
    $req = 'SELECT * 
    FROM images
    WHERE id_image = :idImage
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idImage", $idImage, PDO::PARAM_INT);
    $stmt->execute();
    $image_actuality = $stmt->fetch(PDO::FETCH_ASSOC);
    //Libère la connexion au serveur
    $stmt->closeCursor();

    return  $image_actuality;
}

function getLastNews()
{

    $bdd = connectPDO();

    $stmt = $bdd->prepare('SELECT id_actuality, wording_actuality, content_actuality, a.id_image, i.url_image
    FROM actuality a
    INNER JOIN images i ON a.id_image = i.id_image
    WHERE id_type_actuality = :typeActu
    order by date_publication_actuality DESC
    LIMIT 1

    ');

    $stmt->bindValue(":typeActu", TYPE_ACTU_NEWS, PDO::PARAM_INT);
    $stmt->execute();

    $actualities = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualities;
}


function getLastEventOrActions()
{

    $bdd = connectPDO();

    $stmt = $bdd->prepare('SELECT id_actuality, wording_actuality,
    content_actuality, a.id_image, i.url_image
    FROM actuality a 
    INNER JOIN images i ON a.id_image = i.id_image
    WHERE id_type_actuality = :typeActuAction OR id_type_actuality = :typeActuEvent 
    order by date_publication_actuality DESC
    LIMIT 1

    ');

    $stmt->bindValue(":typeActuAction", TYPE_ACTU_ACTION, PDO::PARAM_INT);
    $stmt->bindValue(":typeActuEvent", TYPE_ACTU_EVENT, PDO::PARAM_INT);
    $stmt->execute();

    $actualities = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualities;
}

function getTypesActuality()
{

    $bdd = connectPDO();
    $req = 'SELECT * 
    FROM type_actuality
    ';
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $typesActuality = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return  $typesActuality;
}

// function insertActuIntoBD($titleActu, $contentActu, $typeActu, $date, $image) {

//     $bdd = connectPDO();
//     $req = 'INSERT INTO actuality(wording_actuality, content_actuality, id_type_actuality, date_publication_actuality, id_image)
//     VALUES (:titleActu, :contentActu, :typeActu, :date, :imageActu)';
//     $stmt = $bdd->prepare($req);
//     $stmt->bindValue(":titleActu", $titleActu, PDO::PARAM_STR);
//     $stmt->bindValue(":contentActu",$contentActu, PDO::PARAM_STR);
//     $stmt->bindValue(":typeActu", $typeActu, PDO::PARAM_INT);
//     $stmt->bindValue(":date", $date, PDO::PARAM_STR);
//     $stmt->bindValue(":imageActu", $image, PDO::PARAM_INT);
//     $result = $stmt->execute();
//     $stmt->closeCursor();

//    if ($result > 0) return true;
//    else return false;

// }

function insertActualiteIntoBD($titleNews, $typeActu, $contenuActu, $date, $image)
{
    $bdd = connectPDO();
    $req = '
    INSERT INTO actuality (wording_actuality, content_actuality, date_publication_actuality, id_image, id_type_actuality)
    values (:titre, :contenu, :date, :image, :typeActualite)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":titre", $titleNews, PDO::PARAM_STR);
    $stmt->bindValue(":contenu", $contenuActu, PDO::PARAM_STR);
    $stmt->bindValue(":date", $date, PDO::PARAM_STR);
    $stmt->bindValue(":image", $image, PDO::PARAM_INT);
    $stmt->bindValue(":typeActualite", $typeActu, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if ($resultat > 0) return true;
    else return false;
}



function updateActuIntoBD($idActuality, $titleActu, $contentActu, $typeActu, $idImage)
{

    $bdd = connectPDO();
    $req = 'UPDATE actuality
    SET wording_actuality = :titleActu ,content_actuality = :contentActu , id_type_actuality = :typeActu, id_image = :pictureActu
    WHERE id_actuality = :idActuality';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":titleActu", $titleActu, PDO::PARAM_STR);
    $stmt->bindValue(":contentActu", $contentActu, PDO::PARAM_STR);
    $stmt->bindValue(":typeActu", $typeActu, PDO::PARAM_INT);
    $stmt->bindValue(":pictureActu", $idImage, PDO::PARAM_INT);
    $stmt->bindValue(":idActuality", $idActuality, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();

    if ($result > 0) return true;
    else return false;
}

function deleteActuFromBD($idActuality)
{

    $bdd = connectPDO();
    $req = 'DELETE FROM actuality
    WHERE id_actuality = :idActuality';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idActuality", $idActuality, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();

    if ($result > 0) return true;
    else return false;
}
