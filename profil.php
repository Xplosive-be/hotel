<?php
require_once("gabarit/header.php");
require_once("gabarit/menu.php");
require_once("lib/php/fonctions.php");
$profil = getProfil($_SESSION['idAccount']);
?>

<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="text-start body-signin ">
            <main class="form-signin" style="max-width: 80%;">
                <form action="models/process.php" method="post">
                    <h1 class="h3 mb-5 fw-normal text-center text-danger fw-bolder">Modification du profil</h1>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="surName" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="surName" value="<?php echo $profil['acc_surname'] ?>"name="surname" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="Name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="Name"  value="<?php echo $profil['acc_name'] ?>" name="name" required>
                        </div>

                        <!-- Email -->
                        <div class="col-12">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" id="email" name="email"  disabled value="<?php echo $profil['acc_email'] ?>">
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $profil['acc_address'] ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="country" class="form-label">Pays</label>
                            <select class="form-select" id="country" name="country" required>
                                <?php
                                    $results = getCountryList();
                                    foreach($results as $country)		
                                    {
                                        echo '<option value="'.$country['country_id'].'"'.(($country['country_id']==$profil['acc_id_country'])?' selected':'').'>'.$country['country_fr'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="city" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="city" value="<?php echo $profil['acc_city'] ?>" name="city" required>
                        </div>
                        <button class=" mt-3 btn btn-danger mx-auto mb-4 fw-bolder" style="width:auto;" type=submit" name="btnEdit">Modifier</button>
                    </form>
                </main>
            </div>
            
            <!-- Bouton de Modification-->
    </div>