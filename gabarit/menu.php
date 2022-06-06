    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img class="logo-menu" src="ressources/images/logo.png" alt="" srcset="">
            </a>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 fs-5">
                <li></li>
                <li><a href="#" class="nav-link px-6 link-dark">Features</a></li>
                <li><a href="#" class="nav-link px-6 link-dark">Pricing</a></li>
                <li><a href="#" class="nav-link px-6 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-6 link-dark">About</a></li>
            </ul>

            <?php 
            if(isset($_SESSION['name'])){
               echo '
               <div class="col-md-3 text-end"><a href="profil.php"><button type="button" class="btn btn-warning text-dark">' . $_SESSION["surname"] . ' ' . $_SESSION["name"] .'</button></a>
               <a href="deconnection.php"><button type="button" class="btn btn-outline-danger me-2">Déconnexion</button></a> 
               </div>';
            } else {
                echo '
                <div class="col-md-3 text-end">
                <a href="connection.php"><button type="button" class="btn btn-outline-danger me-2">Connexion</button></a>
                    <a href="inscription.php"><button type="button" class="btn btn-danger">Inscription</button></a>
                </div>';
            } 
            ?>
        </header>
    </div>