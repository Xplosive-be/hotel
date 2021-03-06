<?php
require_once("gabarit/header.php");
require_once("gabarit/menu.php");
require_once("lib/php/fonctions.php");
Admin();
// Récupere toutes les chambres qui se trouble dans la table Bedroom
$bedrooms = getAllBedrooms();
?>

<h1 class='text-center my-3 text-danger fw-bolder mb-5'>Gestionnaire des chambres</h1>

<table class="table container bg-light p-5 rounded mb-5 border border-2 border-dark">
<a href="admin_addroom.php"><button class="btn btn-danger btn-lg position-fixed top-1 end-0 me-2" name="btnRegistration">+</button></a>
    <thead class="bg-light">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Type de chambre</th>
            <th>Description</th>
            <th>Type de chambre</th>
            <th>€ / nuit</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Boucle pour faire apparaitre les chambres sur la page chambres  -->
    <?php foreach ($bedrooms as $key => $bedroom){
                echo '
                    <tr>
                        <td>
                            <p class="fw-bold mb-1"> ' . $bedroom["bedroom_id"] . '</p>
                        </td>
                        <td> 
                            <p class="fw-bold mb-1"> ' . $bedroom["bedroom_name"] . '</p>
                        </td>
                        <td> 
                            <p class="fw-bold mb-1"> ' . $bedroom["roomcategory_name"] . '</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">' . $bedroom["bedroom_description"] . '</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">' . $bedroom["bedroom_bed"] . '</p>
                        </td>
                        <td>
                            <p class="fst-italic mb-1">' . $bedroom["bedroom_priceday"] . ' € ' . '</p>
                        </td>
                        <td>
                            <a href="admin_managebed.php?IdEditBed=' . $bedroom['bedroom_id'] . '" class="mb-3 text-warning">
                                <i class="fa-solid fa-wrench fa-xl  mt-2"></i>
                            </a></br>
                            <a href="admin_managepicture.php?IdEditPic=' . $bedroom['bedroom_id'] . '" class="text-succes mt-5">
                                <i class="fa-solid fa-image fa-xl  mt-3"></i>
                            </a></br>
                            <a href="models/delete.php?idDelBedRoom=' . $bedroom['bedroom_id'] . '" class="text-danger text-end mt-3">
                                <i class="fa-solid fa-xl fa-trash-can  mt-3"></i>
                            </a>
                        </td>
                    </tr>
                    ';
            } ?>
            </tbody>
        </table>
    <?php require_once("gabarit/footer.php"); ?>