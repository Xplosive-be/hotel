<?php 
require_once("gabarit/header.php");
require_once("gabarit/menu.php"); 
// Init message d'erreur 
$msg_error = "";

// Message d'erreur
if( isset($_GET['error']) ) {
    switch( $_GET['error'] )
    {
    case '403':
        $msg_error = "Accès Interdit.";
        header('refresh:3;url=index.php');
    break;
    case '702':
      $msg_error = "Vous avez déjà validé, votre compte.";
      header('refresh:3;url=index.php');
    break;
    case '703':
      $msg_error = "Erreur de la validation. Contactez un administrateur!";
      header('refresh:3;url=index.php');
    break;
    case '704':
      $msg_error = "Un de vos identifiants est érroné!";
      header('refresh:3;url=index.php');
    break;
    case '705':
      $msg_error = "Votre adresse mail est déjà pris!";
      header('refresh:3;url=inscription.php');
    break;
    case '706':
      $msg_error = "Vos mots de passe ne sont pas identique!";
      header('refresh:3;url=inscription.php');
    break;
    case '707':
      $msg_error ="Votre compte n'est pas activé, veuillez vérifier  votre boîte mail!";
      header('refresh:3;url=index.php');
    case '708':
      $msg_error ="Admin: Erreur avec les id photos ou chambres,ressayez";
      header('refresh:3;url=admin_bedrooms.php');
    case '709':
      $msg_error ="Admin: Erreur imprévu";
      header('refresh:3;url=admin.php');
    }

    echo '
    <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h2 class="bg-danger text-white">'. $msg_error .'</h2>
      </div>
    </div>
  </section>';
// Message de succès
  } elseif (isset($_GET['success'])) {

    switch( $_GET['success'] )
    {
    case '100':
      $msg_succes = "Votre compte a été activé.";
      header('refresh:3;url=index.php');
    break;
    case '101':
      $msg_succes = "Votre compte a été crée.";
      header('refresh:3;url=index.php');
    break;
    case '102':
      $msg_succes = "Bienvenu(e) " . $_SESSION['name'];
      header('refresh:3;url=index.php');
    break;
    case '103':
      $msg_succes = "Au revoir et à bientôt!";
      header('refresh:3;url=index.php');
    break;
    case '104':
      $msg_succes = "Vos informations ont été modifiés avec succès.";
      header('refresh:3;url=profil.php');
    break;
    case '105':
      $msg_succes = "Votre message a été envoyé, nous y répondrons dans un délais de 24 h ouvrables.";
      header('refresh:3;url=index.php');
    break;
    case '106':
      $msg_succes = "Admin --- Les informations ont été modifiés avec succès.";
      header('refresh:3;url=index.php');
    break;
    case '107':
      $msg_succes = "Admin --- La chambre a été modifié avec succès.";
      header('refresh:3;url=admin_bedrooms.php');
    break;
    case '108':
      $msg_succes = "Admin --- Chambre rajouté avec succès.";
      header('refresh:3;url=admin_bedrooms.php');
    break;
    case '109':
      $msg_succes = "Admin --- La photo a été rajoutée avec succès.";
      header('refresh:3;url=admin_managepicture.php?IdEditPic=' . $_SESSION["idEditPic"].'');
    break;
    case '110':
      $msg_succes = "Admin --- La photo a été supprimée avec succès.";
      header('refresh:3;url=admin_managepicture.php?IdEditPic=' . $_SESSION["idEditPic"].'');
    break;
    case '111':
      $msg_succes = "Admin --- L'utilisateur a été suprimée.";
      header('refresh:3;url=admin_managepicture.php?IdEditPic=' . $_SESSION["idEditPic"].'');
    break;
    case '112':
      $msg_succes = "Admin --- La chambre a été suprimée.";
      header('refresh:3;url=admin_bedrooms.php');
    break;
    }

    echo '
    <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h2 class="bg-success text-white">'. $msg_succes .'</h2>
      </div>
    </div>
  </section>';
} else {
    header('Location: index.php');
}
 require_once("gabarit/footer.php");
?>