<?php 
require_once("gabarit/header.php");
require_once("gabarit/menu.php"); 
require_once("lib/php/fonctions.php");

//  Destruction et désaffectation de la variable session 
session_unset();
session_destroy();
//   $msg_succes = "Au revoir et à bientôt!";
header('Location: message.php?success=103');
?>
<?php require_once("gabarit/footer.php"); ?>