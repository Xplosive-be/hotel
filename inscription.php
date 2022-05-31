<?php
require_once("gabarit/header.php");
require_once("lib/php/fonctions.php");
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
                <form  name="formulaire" method="post" action="models/process.php" >
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="surName" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="surName" name="surname" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="Name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="Name" name="name" required>
                        </div>

                        <!-- Email -->
                        <div class="col-12">
                            <label for="email" class="form-label">Adresse e-mail <span class="text-muted"> (Obligatoire)</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="contact@belle-nuit.be">
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelpInline">
                            <div id="passwordHelpInline" class="form-text">Minimun de 8 caractères, maximum 20 caractères et un caractère spéciaux </div>
                        </div>

                        <div class="col-12">
                                <label for="address" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="address" name="address"placeholder="Rue de la paix" required>
                        </div>


                        <div class="col-sm-6">
                            <label for="country" class="form-label">Pays</label>
                            <select class="form-select" id="country" name="country" required>
                                <?php
                                    $results = getCountryList();
                                    foreach($results as $country)		
                                    {
                                        echo '<option value="'.$country['country_id'].'"'.(($country['country_fr']==$COUNTRY)?' selected':'').'>'.$country['country_fr'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-danger btn-lg" type="submit" name="btnRegistration">Envoyer</button>
                </form>
            </div>
        </div>
    </main>
</div>


<?php require_once("gabarit/footer.php"); ?>