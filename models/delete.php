<?php 
    require_once("../lib/php/fonctions.php");
    require_once("../lib/php/pdo.php");
    session_start();
    Admin();

    if(isset($_GET['delIdPicture']) && isset($_SESSION['idEditPic'])){
        $db = connectionBD();
        // Récupérer l'url de l'image pour la supprimé 
        $stmt = $db->prepare('
        SELECT `picture_url` FROM `picture`WHERE `picture_id`='. $_SESSION["idEditPic"].'');
        $stmt->execute();
        $urlPicture = $stmt->fetch(PDO::FETCH_ASSOC);
        // Supprime le fichier dans le dossier
        unlink($urlPicture['picture_url']); 
        // Supprime l'image dans la table gallery
        $stmt = $db->prepare("DELETE FROM `gallery` WHERE `id_picture` = ". $_GET['delIdPicture'] ." AND `id_bedroom` = ". $_SESSION['idEditPic'] ."");
        $stmt->execute();
        // Supprime l'image dans la table picture
        $stmt = $db->prepare("DELETE FROM `picture` WHERE picture_id =". $_GET['delIdPicture']."");
        $stmt->execute();
        header('Location: ../message.php?success=110');
    } elseif(isset($_GET['idDelUser'])) {
        // Requête pour supprimer l'utilisateur
        $db = connectionBD();
        $stmt = $db->prepare('
        DELETE FROM `account` WHERE `acc_id` = '. $_GET["idDelUser"].'');
        $stmt->execute();
        // $msg_succes = "Admin --- L'utilisateur a été suprimée.";
        header('Location: ../message.php?success=111');
    } elseif(isset($_GET['idDelBedRoom'])) {
        // Supprime les liaisons ( clef étrangère) des images avec les chambres
        $db = connectionBD();
        $stmt = $db->prepare("DELETE FROM `gallery` WHERE `id_bedroom` = ". $_GET['idDelBedRoom'] ."");
        $stmt->execute();
        // Supprime la chambre
        $stmt = $db->prepare("DELETE FROM `bedroom` WHERE `bedroom_id` = ". $_GET['idDelBedRoom'] ."");
        $stmt->execute();
        // $msg_succes = "Admin --- La chambre a été suprimée.";
        header('Location: ../message.php?success=112');
    } else {
        // $msg_error ="Admin: Erreur avec les id photos ou chambres,ressayez";
        header('Location: ../message.php?error=708');
    }

?> 