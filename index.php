<?php 
require_once("gabarit/header.php");
require_once("gabarit/menu.php"); 
require_once("lib/php/fonctions.php");

$bedroom = getBedroomFromId(2);
var_dump($bedroom);

$images = getImageBedroom(2);
var_dump($images);


?>

<img src="<?php echo $images[3]['picture_url']?>"  alt="" srcset="">
<?php require_once("gabarit/footer.php"); ?>