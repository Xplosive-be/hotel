<!-- PAGE PHP - Permet d'activer le compte via le lien donné par mail.
acc_activation.php?id=&codeActivation= -->

<?php 
require_once("gabarit/header.php");
require_once("gabarit/menu.php"); 
require_once("lib/php/fonctions.php");

if(isset($_GET['id']) && isset($_GET['codeActivation'])){


  // récupération des Get dans une variable avec une vérification grâce à HtmlspecialChars
  $idAccount = htmlspecialchars($_GET['id']);
  $codeActivation = htmlspecialchars($_GET['codeActivation']);

  // Init du tableau dans une variable
  $InfoActivation = getAccountCodeActivation($idAccount);

  // Init des variables via le tableau $InfoActivation
  $codeDbActivation = $InfoActivation['acc_code_activation'];
  $getActive = $InfoActivation['acc_active'];


  
  if ($codeActivation == $codeDbActivation && $getActive == '0') {
      echo'
        <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="text-secondary">Activation Code</h1>
            <p class="bg-success text-white">Votre compte a été validé.</p>
          </div>
        </div>
        </section>';

      // Changement de status pour l'activation 
      setAccountActivation($idAccount);

      header('refresh:3;url=index.php');

    } elseif ($getActive  == '1' )
    {
      echo '
          <section class="py-5 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="text-secondary">Problème lors de validation</h1>
              <p class="bg-danger text-white">Vous avez déjà validé, votre compte.</p>
            </div>
          </div>
        </section>';
        
      header('refresh:2;url=index.php');

    } else{
      echo'
        <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="text-secondary">Problème lors de validation</h1>
            <p class="bg-danger text-white">Erreur de la validation. Contactez un administrateur!</p>
          </div>
        </div>
      </section>';
      header('refresh:2;url=index.php');
    }
} else {
  echo'
    <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="bg-danger text-white">Accès non-autorisé</h1>
      </div>
    </div>
  </section>';
  
  header('refresh:2;url=index.php');
  }
?>
<?php require_once("gabarit/footer.php"); ?>