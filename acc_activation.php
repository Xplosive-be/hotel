<?php 
// PAGE PHP - Permet d'activer le compte via le lien donné par mail.
// acc_activation.php?id=&codeActivation=
require_once("gabarit/header.php");
require_once("gabarit/menu.php"); 
require_once("lib/php/fonctions.php");
  // Si présence du Get ID & CodeActivation
if(isset($_GET['id']) && isset($_GET['codeActivation'])){
  // récupération des Get dans une variable avec une vérification grâce à HtmlspecialChars
  $idAccount = htmlspecialchars($_GET['id']);
  $codeActivation = htmlspecialchars($_GET['codeActivation']);
  // Init du tableau dans une variable
  $InfoActivation = getAccountCodeActivation($idAccount);
  // Init des variables via le tableau $InfoActivation
  $codeDbActivation = $InfoActivation['acc_code_activation'];
  $getActive = $InfoActivation['acc_active'];
  // Condition si n'est pas active et que le code reçu en get est égal au code présent dans la db pour l'id présent dans le Get
  if ($codeActivation == $codeDbActivation && $getActive == '0') {
    // Changement de status pour l'activation 
      setAccountActivation($idAccount);
      // redirection vers le $msg_succes = "Votre compte a été activé.";
      header('Location: message.php?success=100');
      // Si Le compte est déjà validé
    } elseif ($getActive  == '1' ) {
      // redirection vers le $msg_error = "Vous avez déjà validé, votre compte."
      header('Location: message.php?error=702');
    } else {
      // si le code n'est pas bon 
      // redirection vers le $msg_error =  "Erreur de la validation. Contactez un administrateur!"
      header('Location: message.php?error=703');
    }
} else {
  // Si l'utilsateur arrive sur la page avec autres choses chose que les 2 get.
  // redirection vers le $msg_error = "Accès Interdit"
  header('Location: message.php?error=403');
  }
?>