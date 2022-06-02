<?php 
require_once("gabarit/header.php");
require_once("gabarit/menu.php"); 
// Init message d'erreur 
$msg_error = "";

if( isset($_GET['error']) ) {
    switch( $_GET['error'] )
    {
    case '403':
        $msg_error = "Accès Interdit";
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
      $msg_error = "Un de vos identifiants est érroné! ";
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
    }

    echo '
    <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h2 class="bg-danger text-white">'. $msg_error .'</h2>
      </div>
    </div>
  </section>';

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