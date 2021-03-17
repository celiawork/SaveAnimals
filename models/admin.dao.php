<?php

function getPasswordUser($login){
    $bdd = connectPDO();
    $req = 'SELECT * 
    FROM administrator
    where login = :login';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":login",$login,PDO::PARAM_STR);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $admin;
}

function isConnexionValid($login,$password){
    $admin = getPasswordUser($login);
    return password_verify($password,$admin['password']);
}