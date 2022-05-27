<?php
require_once("gabarit/header.php");
require_once("lib/php/pdo.php");
include('lib/config/config.php');
$connexion = connectionBD();
?>

<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="ressources/images/logo.png" alt="Logo Hotel Belle nuit" width="100" height="100">
            <h2 class="text-danger fw-bold">Inscription</h2>
            <p class="lead fst-italic">Vous désirez réserver une chambre dans notre hôtel ? Alors inscrivez-vous.</p>
        </div>

        <div class="row g-5 justify-content-center">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Information</h4>
                <form class="needs-validation" novalidate>
                    <div class="row g-3">

                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Un prénom valide est requis.
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Un nom valide est requis.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="contact@belle-nuit.be" aria-describedby="passwordHelpInline">
                            <div class="invalid-feedback">
                                Merci d'introduire un password
                            </div>
                            <div id="passwordHelpInline" class="form-text">Minimun de 8 caractères, maximum 20 caractères et un caractère spéciaux </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Adresse e-mail <span class="text-muted"> (Obligatoire)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="contact@belle-nuit.be">
                            <div class="invalid-feedback">
                                Merci d'introduire un mail valide.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="address" placeholder="Rue de la paix" required>
                            <div class="invalid-feedback">
                                Merci d'introduire votre adresse.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Pays</label>
                            <select class="form-select" id="country" name="country" required>
                                <?php
                                    $db = ConnectionBD();
                                    $sql = "SELECT country_id, country_fr FROM country";
                                    $results = $db->query( $sql );
                                    foreach($results as $country)		
                                    {
                                        echo '<option value="'.$country['country_id'].'"'.(($country['country_fr']==$COUNTRY)?' selected':'').'>'.$country['country_fr'].'</option>';
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Choisir un pays
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="state" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="state" required>
                            <div class="invalid-feedback">
                                Merci de founir une ville de résidence!
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-danger btn-lg" type="submit" name="inscription">Envoyer</button>
                </form>
            </div>
        </div>
    </main>
</div>

<script src="ressources/js/form-validation.js"></script>

<?php require_once("gabarit/footer.php"); ?>