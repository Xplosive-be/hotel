<?php
require_once("gabarit/header.php");
require_once("gabarit/menu.php");
require_once("lib/php/fonctions.php");
Admin();
$_SESSION['idEditPic'] = $_GET['IdEditPic'];
$imagesBedroom = getImagesBedroom($_GET['IdEditPic']);
?>
<h1 class='text-center my-3 text-danger fw-bolder mb-5'>Gestionnaire des images pour la chambre </h1>
<a href="#addPic">"><button class="btn btn-danger btn-lg position-fixed top-1 end-0 me-2" name="btnRegistration">+</button></a>
<div class="row justify-content-center">
    <?php
    // Boucle pour afficher les images liées à la chambre
    foreach ($imagesBedroom as $key => $image) {
        echo ' 
                <p class="text-center"> ID Picture : ' . $image["picture_id"] . '</p>
                <a href="models/delete.php?delIdPicture=' . $image["picture_id"] .'" class="text-danger text-center  mb-3 mt-1"><i class="fa-solid fa-xl fa-trash-can mt-3"></i></a>
                <img src="' . $image["picture_url"] . '" alt="' . $image["picture_description"] . '" class="w-25 text-center mb-2 mb-md-4 shadow-1-strong rounded" >
                <hr>
            ';
    }
    ?>
    <div class="row w-50 " id="addPic">
        <form action="models/process.php" method="post" enctype="multipart/form-data">
        <label for="formFileLg" class="form-label">Ajouter un Fichier</label>
        <input class="form-control form-control-lg" id="formFileLg"  name="image" type="file">
        <button class=" w-25 mt-3 btn btn-danger type=" submit" name="btnAddPic">Envoyer Fichier</button>
        </form>
    </div>
</div>

<?php require_once("gabarit/footer.php"); ?>