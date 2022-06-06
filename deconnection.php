<?php 
require_once("gabarit/header.php");
require_once("gabarit/menu.php"); 
require_once("lib/php/fonctions.php");

session_unset();
header('Location: message.php?success=103');
?>
<?php require_once("gabarit/footer.php"); ?>