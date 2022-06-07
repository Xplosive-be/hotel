<?php
require_once("gabarit/header.php");
require_once("gabarit/menu.php");
require_once("lib/php/fonctions.php");
?>
<main>
    <h1 class='text-center my-3 text-danger fw-bolder'>Administration</h1>
    <div class="container py-4">
        <div class="row align-items-md-stretch justify-content-center">
            <div class="col-md-auto">
                <div class="p-5 bg-light border border-danger rounded-3 border-5">
                    <img src="ressources/icones/user.png" class="text-center" alt="Icons user"></br>
                    <a class="btn btn-secondary mt-2 ms-auto " href="#">Gérer les comptes</a>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="p-5 bg-light  border border-danger border-5">
                    <img src="ressources/icones/bed.png" alt="Icons Bed"></br>
                    <a class="btn btn btn-secondary mt-2 " href="#">Voir les réservations</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once("gabarit/footer.php"); ?>