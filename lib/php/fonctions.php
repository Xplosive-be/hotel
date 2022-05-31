<?php
require("pdo.php");

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

function SetAccountActivation($idAccount) {
    $bdd = connectionBD();
    $stmt = $bdd->prepare('
    UPDATE `account` 
    SET `acc_active`= 1 
    WHERE `acc_id` = :idAccount LIMIT 1');
    $stmt->bindValue(":idAccount", $idAccount);
    $stmt->execute();
    $stmt->closeCursor();
}



