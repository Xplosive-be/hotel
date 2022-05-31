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
      header('Location : message.php?success=100');
      // Changement de status pour l'activation 
      setAccountActivation($idAccount);

    } elseif ($getActive  == '1' ) {
      header('Location : message.php?error=702');
    } else {
      header('Location: message.php?error=703');
    }
} else {
  header('Location: message.php?error=403');
  }
?>