<?php
require_once("gabarit/header.php");
require_once("gabarit/menu.php");
require_once("lib/php/fonctions.php");
$bedrooms = getAllBedrooms();
?>

<h1 class='text-center my-3 text-danger fw-bolder'>Nos chambres</h1>
<!-- Boucle pour afficher les chambres  -->
<?php foreach ($bedrooms as $bedroom) : ?>
    <main class="container bg-light p-5 border border-danger rounded mb-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-danger fst-italic fw-bolder "><?= $bedroom['bedroom_name'] ?></h2>
                <p class="lead"><?= $bedroom['bedroom_description'] ?></p>
            </div>
            <div id="carouselExampleSlidesOnly" class="carousel slide col-6" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner ">

                    <?php foreach ($bedrooms as $key => $bedroomImages) {
                        $images = getImagesBedroom($bedroom['bedroom_id']);
                        $bedroomsImages[$key]['image'] = $images;
                        // Si la Key est 0 alors on mets active pour le carrousel sinon 
                        $active = ($key == 0) ? 'active' : '';
                        echo '<div class="carousel-item ' . $active . '">';
                        echo '
                        <img src="' . $bedroomsImages[$key]["image"][$key]["picture_url"] . '" class="d-block w-100 active " alt="' . $bedroomsImages[$key]["image"][$key]["picture_description"].'">
                        </div>';}
                    ?>
                </div>
                <h4>Prix: <span class="text-danger"><?= $bedroom['bedroom_priceday'] ?> </span> € /nuit.</h4>
            </div>
        </div>
    </main>
<?php endforeach; ?>
<?php require_once("gabarit/footer.php"); ?>