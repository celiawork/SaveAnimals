<?php

function insertImageIntoBD($nameImage, $urlImage){

$bdd = connectPDO();
$req = 'INSERT INTO images(wording_image, url_image, description_image)
VALUES (:nameImage, :urlImage, :descripImage)';
$stmt = $bdd->prepare($req);

$stmt->bindValue(":nameImage", $nameImage, PDO::PARAM_STR);
$stmt->bindValue(":urlImage", $urlImage, PDO::PARAM_STR);
$stmt->bindValue(":descripImage", $nameImage, PDO::PARAM_STR);
$stmt->execute();
$result = $bdd->lastInsertId();
$stmt->closeCursor();
return $result;

}

function getAllImagesFromBD(){

    $bdd = connectPDO();

    $req = 'SELECT * 
            FROM images
            ORDER BY id_image DESC';
           
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    //PDO::FETCH_ASSOC affiche un tableau associatif 
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $images;
}