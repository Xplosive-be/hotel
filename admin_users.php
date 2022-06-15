<?php
require_once("gabarit/header.php");
require_once("gabarit/menu.php");
require_once("lib/php/fonctions.php");
Admin();
$profils = getProfils();
?>

<h1 class='text-center my-3 text-danger fw-bolder mb-5'>Gestionnaire d'Utilisateur</h1>
<table class="table container bg-light p-5 rounded mb-5 border border-2 border-dark">
    <thead class="bg-light">
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Status</th>
            <th>Admin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($profils as $key => $profil){
                echo '
                    <tr>
                        <td>
                            <p class="fw-bold mb-1"> ' . $profil["acc_id"] . '</p>
                        </td>
                        <td> 
                            <p class="fw-bold mb-1"> ' . $profil["acc_surname"] . '</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">' . $profil["acc_name"] . '</p>
                        </td>
                        <td>
                            <p class="fst-italic mb-1">' . $profil["acc_email"] . '</p>
                        </td>
                ';
                 echo ($profil['acc_active'] == 1) ? '<td><span class="badge bg-success rounded-pill d-inline">Active</span></td>' : '<td><span class="badge bg-danger rounded-pill d-inline">Inactive</span></td>';
                 echo ($profil['acc_admin'] == 1) ? '<td><span class="badge bg-success rounded-pill d-inline">Active</span></td>' : '<td><span class="badge bg-danger rounded-pill d-inline">Inactive</span></td>';
                echo '   
                    <td>
                        <a href="admin_profil.php?Id=' . $profil['acc_id'] . '" class="text-warning">
                            <i class="fa-solid fa-wrench fa-xl"></i>
                        </a>
                        <a href="models/delete.php?idDelUser='. $profil["acc_id"] .'" class="text-danger">
                            <i class="fa-solid fa-xl fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
                ';
            } ?>
            </tbody>
        </table>
    <?php require_once("gabarit/footer.php"); ?>