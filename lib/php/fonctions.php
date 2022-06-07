<?php
require("pdo.php");

// Fonction pour les créations de compte
function EncryptPassword( $password )
{
    $SALT = 'H@nk@4';
    $PEPPER = 'S@m!r';
	return hash('sha512',$SALT.$password.$PEPPER);
}
function getCountryList(){
    $bdd = connectionBD();
    $stmt = $bdd->prepare('
    SELECT country_id, country_fr 
    FROM country');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $results;
}

function getAccountCodeActivation($idAccount) {
    $bdd = connectionBD();
    $stmt = $bdd->prepare('
    SELECT  `acc_code_activation`, `acc_active`
    FROM `account` 
    WHERE `acc_id`=  :idAccount LIMIT 1');
    $stmt->bindValue(":idAccount", $idAccount);
    $stmt->execute();
    $InfoActivation = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $InfoActivation;
}

function setAccountActivation($idAccount) {
    $bdd = connectionBD();
    $stmt = $bdd->prepare('
    UPDATE `account` 
    SET `acc_active`= 1 
    WHERE `acc_id` = :idAccount LIMIT 1');
    $stmt->bindValue(":idAccount", $idAccount);
    $stmt->execute();
    $stmt->closeCursor();
}

// fonction pour le profil 
function getProfil($idAccount){
    $bdd = connectionBD();
    $stmt = $bdd->prepare('
    SELECT  *
    FROM `account` 
    WHERE `acc_id`=  :idAccount LIMIT 1');
    $stmt->bindValue(":idAccount", $idAccount);
    $stmt->execute();
    $profil = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $profil;
}

// fonction pour les chambres 

function getAllBedrooms () {
    $bdd = connectionBD();
    $stmt = $bdd->prepare('
    SELECT * 
    FROM bedroom ');
    $stmt->execute();
    $bedrooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $bedrooms;
}
function getBedroomFromId ($idBedroom) {
    $bdd = connectionBD();
    $stmt = $bdd->prepare('
    SELECT * 
    FROM bedroom 
    where bedroom_id = :idBedroom');
    $stmt->bindValue(":idBedroom",$idBedroom);
    $stmt->execute();
    $bedroom = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $bedroom;
}

function getImagesBedroom($idBedroom){
    $bdd = connectionBD();
    $stmt = $bdd->prepare('
    SELECT p.picture_id,picture_name,picture_url,picture_description
    FROM picture p 
    INNER JOIN gallery g on p.picture_id = g.id_picture
    INNER JOIN bedroom b on b.bedroom_id = g.id_bedroom
    WHERE b.bedroom_id = :idBedroom;');
    $stmt->bindValue(":idBedroom", $idBedroom);
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $images;
}



