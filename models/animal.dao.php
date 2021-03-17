<?php

require_once "pdo.php";

function getAllAnimals(){

    $bdd = connectPDO();
    
    $req = 'SELECT *
    FROM animal
    ';

$stmt = $bdd->prepare($req);
$stmt->execute();
//PDO::FETCH_ASSOC Récupère une ligne de résultat sous forme de tableau associatif
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
return $animals;
}


function getAnimal($idAnimal)
{

    $bdd = connectPDO();

    $req = 'SELECT * 
            FROM animal 
            WHERE id_animal = :idAnimal';

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT);
    $stmt->execute();
    //PDO::FETCH_ASSOC affiche un tableau associatif 
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $animal;
}


function getAnimalFromStatus($idStatut)


{
    $bdd = connectPDO();

    $req = 'SELECT * 
            FROM animal 
            WHERE id_status = :idStatus';

    if ($idStatut === ID_STATUS_ADOPTED) {
        $req .= ' or id_status = ' . ID_STATUS_DEAD;
    }

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idStatus", $idStatut, PDO::PARAM_INT);
    $stmt->execute();
    //PDO::FETCH_ASSOC affiche un tableau associatif 
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $animals;
}

function getListStatusAnimal()
{

    $bdd = connectPDO();

    $req = 'SELECT * 
            FROM status ';

    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $status = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $status;
}


function getAnimalFromTypeAndStatus($idStatut, $typeAnimal)
{

    $bdd = connectPDO();

    $req = 'SELECT * 
            FROM animal 
            WHERE id_status = :idStatus AND type_animal = :typeAnimal';

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idStatus", $idStatut, PDO::PARAM_INT);
    $stmt->bindValue(":typeAnimal", $typeAnimal, PDO::PARAM_STR);
    $stmt->execute();
    //PDO::FETCH_ASSOC affiche un tableau associatif 
    $animals = $stmt->fetchall(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $animals;
}

function getFirstImageAnimal($idAnimal)
{

    $bdd = connectPDO();

    $stmt = $bdd->prepare("SELECT *
    FROM images i 
    INNER JOIN animal_image ai on i.id_image = ai.id_images 
    INNER JOIN animal a on ai.id_animal = a.id_animal     
    Where a.id_animal = :idAnimal 
    LIMIT 1");

    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT); //Fonction de PDO permet de sécuriser et d'éviter des injections SQL
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $image;
}


function getAnimalImages($idAnimal)

{

    $bdd = connectPDO();

    $stmt = $bdd->prepare("SELECT *
    FROM images i 
    INNER JOIN animal_image ai on i.id_image = ai.id_images 
    INNER JOIN animal a on ai.id_animal = a.id_animal     
    Where a.id_animal = :idAnimal 
   ");

    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT); //Fonction de PDO permet de sécuriser et d'éviter des injections SQL
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $images;
}



function getAnimalCharacters($idAnimal)
{

    $bdd = connectPDO();

    $stmt = $bdd->prepare("SELECT *
    FROM `character` c
    INNER JOIN animal_character ac ON c.id_character = ac.id_character
    WHERE id_animal = :idAnimal
    ");

    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT);
    $stmt->execute();
    $characters = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $characters;
}




function getListCharactersAnimal()
{

    $bdd = connectPDO();

    $req = 'SELECT *
            FROM `character`
            ';

    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $characters = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $characters;
}


function insertIntoBD_Character_Animal($character, $idAnimal)
{

    $bdd = connectPDO();

    $req = 'INSERT INTO animal_character 
    VALUES(:idCharacter, :idAnimal) 
    ';

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idCharacter", $character, PDO::PARAM_INT);
    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}

function insertIntoBD_Animal_Image($idAnimal, $idImage)
{

    $bdd = connectPDO();

    $req = ' INSERT INTO animal_image values( :idAnimal, :idImage)
    ';

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT);
    $stmt->bindValue(":idImage", $idImage, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}



function insertAnimalIntoBD($nameAnimal, $type, $sex, $dateB, $friendDog, $friendCat, $friendChild, $description, $adoptionDesc, $localisation, $engagement, $status)
{

    $bdd = connectPDO();
    $req = 'INSERT INTO animal(name_animal, type_animal, gender, birth, friend_dog, friend_cat, friend_child, description_animal, adoption_description_animal, localisation, engagement_description_animal, id_status)
    VALUES (:nameAnimal, :typeAnimal, :sexe, :dateB, :friendDog, :friendCat, :friendChild, :description, :adoptiondesc, :localisation, :engagement, :status)';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":nameAnimal", $nameAnimal, PDO::PARAM_STR);
    $stmt->bindValue(":typeAnimal", $type, PDO::PARAM_STR);
    $stmt->bindValue(":sexe", $sex, PDO::PARAM_STR);
    $stmt->bindValue(":dateB", $dateB, PDO::PARAM_STR);
    $stmt->bindValue(":friendDog", $friendDog, PDO::PARAM_STR);
    $stmt->bindValue(":friendCat", $friendCat, PDO::PARAM_STR);
    $stmt->bindValue(":friendChild", $friendChild, PDO::PARAM_STR);
    $stmt->bindValue(":description", $description, PDO::PARAM_STR);
    $stmt->bindValue(":adoptiondesc", $adoptionDesc, PDO::PARAM_STR);
    $stmt->bindValue(":localisation", $localisation, PDO::PARAM_STR);
    $stmt->bindValue(":engagement", $engagement, PDO::PARAM_STR);
    $stmt->bindValue(":status", $status, PDO::PARAM_INT);
    $stmt->execute();
    $result = $bdd->lastInsertId();
    $stmt->closeCursor();
    return $result;
}

function updateAnimalIntoBD($idAnimal, $nameAnimal, $dateB, $typeEnter, $sex, $dateAdoption, $friendDog, $friendCat, $friendChild, $description, $adoptionDesc, $localisation, $engagement, $status)
{


    $bdd = connectPDO();
    $req = 'UPDATE animal
    SET name_animal = :nameAnimal, type_animal=:typeAnimal, gender=:sexe, birth=:dateB, friend_dog=:friendDog, friend_cat=:friendCat, friend_child=:friendChild, description_animal=:description, adoption_description_animal=:adoptiondesc, localisation=:localisation, engagement_description_animal=:engagement, id_status=:status
    WHERE id_animal = :idAnimal';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT);
    $stmt->bindValue(":nameAnimal", $nameAnimal, PDO::PARAM_STR);
    $stmt->bindValue(":typeAnimal", $typeEnter, PDO::PARAM_STR);
    $stmt->bindValue(":sexe", $sex, PDO::PARAM_STR);
    $stmt->bindValue(":dateB", $dateB, PDO::PARAM_STR);
    $stmt->bindValue(":friendDog", $friendDog, PDO::PARAM_STR);
    $stmt->bindValue(":friendCat", $friendCat, PDO::PARAM_STR);
    $stmt->bindValue(":friendChild", $friendChild, PDO::PARAM_STR);
    $stmt->bindValue(":description", $description, PDO::PARAM_STR);
    $stmt->bindValue(":adoptiondesc", $adoptionDesc, PDO::PARAM_STR);
    $stmt->bindValue(":localisation", $localisation, PDO::PARAM_STR);
    $stmt->bindValue(":engagement", $engagement, PDO::PARAM_STR);
    $stmt->bindValue(":status", $status, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();

    if ($result > 0) return true;
    else return false;
}

function deleteCharacterAnimalIntoBD($idAnimal)
{


    $bdd = connectPDO();
    $req = 'DELETE FROM animal_character 
    WHERE id_animal = :idAnimal';

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}

function deleteAnimalFromBD($idAnimal)
{

    $bdd = connectPDO();
    $req = 'DELETE FROM animal
    WHERE id_animal = :idAnimal';

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();
    return $result;
}

function  deleteImagesFromAnimal($idImage, $idAnimal)
{

    $bdd = connectPDO();
    $req = 'DELETE FROM animal_image
    WHERE id_animal = :idAnimal AND id_images = :idImage';

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT);
    $stmt->bindValue(":idImage", $idImage, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();
    return $result;
}
