<?php
require_once("gabarit/header.php");
require_once("gabarit/menu.php");
require_once("lib/php/fonctions.php");
Admin();
$bedrooms = getAllBedrooms();
?>

<h1 class='text-center my-3 text-danger fw-bolder mb-5'>Gestionnaire des chambres</h1>

<table class="table container bg-light p-5 rounded mb-5 border border-2 border-dark">
<a href="admin_addroom.php"><button class="btn btn-danger btn-lg position-fixed top-1 end-0 me-2" name="btnRegistration">+</button></a>
    <thead class="bg-light">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Type de chambre</th>
            <th>Nombres</th>
            <th>€ / nuit</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
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
                            <p class="fw-bold mb-1">' . $bedroom["bedroom_description"] . '</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">' . $bedroom["bedroom_bed"] . '</p>
                        </td>
                        <td>
                            <p class="fst-italic mb-1">' . $bedroom["bedroom_people"] . '</p>
                        </td>
                        <td>
                            <p class="fst-italic mb-1">' . $bedroom["bedroom_priceday"] . ' € ' . '</p>
                        </td>
                        <td>
                            <a href="admin_managebed.php?Id=' . $bedroom['bedroom_id'] . '" class="text-warning">
                                <i class="fa-solid fa-wrench fa-xl"></i>
                            </a>
                            <a href="#" class="text-danger">
                                <i class="fa-solid fa-xl fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    ';
            } ?>
            </tbody>
        </table>
    <?php require_once("gabarit/footer.php"); ?>