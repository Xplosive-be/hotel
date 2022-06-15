<?php 
    require_once("../lib/php/fonctions.php");
    require_once("../lib/php/pdo.php");
    session_start();
    
    if( isset( $_POST['btnRegistration'])){
            $surname = htmlspecialchars($_POST['surname']);
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password_two = htmlspecialchars($_POST['password_two']);
            $address = htmlspecialchars($_POST['address']);
            $country = htmlspecialchars($_POST['country']);
            $city = htmlspecialchars($_POST['city']);
            // Vérification si les mots de passes ne sont pas les même.
            if($password != $password_two) {
                // $msg_error = "Vos mots de passe ne sont pas identique!";
                header('Location: ../message.php?error=706');
                exit();
            }
            // Permet de crypter un mot de pass.
            $password = EncryptPassword($password);
            // Code généré pour permettre d'avoir un code unique pour valider son compte.
            $codeactivation = hash('md2', 'Hello'. rand(5000, 10000) . 'Inscription');

            $db = connectionBD();
            $Inscription = $db->prepare('SELECT count(*) as numberEmail From account WHERE acc_email = :mail');
            $Inscription->bindValue(':mail', $email, PDO::PARAM_STR);
            $Inscription->execute();
            // Boucle pour savoir si le
            while($email_verification = $Inscription->fetch(PDO::FETCH_ASSOC)) {
                if($email_verification['numberEmail'] != 0) {
                    // $msg_error = "Votre adresse mail est déjà pris!";
                    header('Location: ../message.php?error=705');
                    exit();
                }
            
            //  Création de la requête sql
            // `account`(`acc_id`, `acc_name`, `acc_surname`, `acc_address`, `acc_city`, `acc_id_country`, `acc_email`, `acc_password`, `acc_code_activation`, `acc_admin`, `acc_active`)
                $sql = "INSERT INTO account VALUES (null,'$name','$surname','$address','$city', '$country','$email','$password', '$codeactivation', 0,0)";
                $db->exec( $sql );
                // $msg_succes = "Votre compte a été crée.";
                header('Location: ../message.php?success=101');
                exit();
        }
    }
        // PARTIE 
        // CONNECTION
    if (isset( $_POST['btnConnection'])) {
        $login = htmlspecialchars($_POST['login']);
        $password = EncryptPassword(htmlspecialchars($_POST['password']));
        $db = connectionBD();
        $Account = $db->prepare('SELECT * 
                                    FROM account
                                    WHERE acc_email = :mail');
        $Account->bindValue(':mail', $login, PDO::PARAM_STR);
        $Account->execute();
        $data = $Account->fetch(PDO::FETCH_ASSOC);
            // Connection 
            if(!empty($data)) {
                if ($password == $data["acc_password"]  && $data["acc_active"] != 0 ){
                    //Init variable pour des fonctions suivante
                    $_SESSION['online'] = 1; 
                    $_SESSION['idAccount'] = $data["acc_id"];
                    $_SESSION['surname'] = $data["acc_surname"];
                    $_SESSION['name'] = $data["acc_name"];
                    $_SESSION['email'] = $data["acc_email"];
                    $_SESSION['address'] = $data["acc_address"];
                    $_SESSION['city'] = $data["acc_city"];
                    $_SESSION['country'] = $data["acc_id_country"];
                    $_SESSION['admin'] = $data["acc_admin"];
                    //  $msg_succes = "Bienvenu(e) " . $_SESSION['name'];
                    header('Location: ../message.php?success=102');
                    exit();
                } elseif ($data["acc_active"] == 0){
                    // $msg_error ="Votre compte n'est pas activé, veuillez vérifier  votre boîte mail!"
                    header('Location: ../message.php?error=707');
                    exit();
                } else {
                    // $msg_error = "Un de vos identifiants est érroné! ";
                    header('Location: ../message.php?error=704');
                    exit();
                }
            } else {
                // $msg_error = "Un de vos identifiants est érroné! ";
                header('Location: ../message.php?error=704');
                exit();
            }
        }
        // Back-end du formulaire de modification du profil.
        if (isset( $_POST['btnEdit'])) {
            // Verification et sécurisation des nouvelles données.
            $surname = htmlspecialchars($_POST['surname']);
            $name = htmlspecialchars($_POST['name']);
            $address = htmlspecialchars($_POST['address']);
            $country = htmlspecialchars($_POST['country']);
            $city = htmlspecialchars($_POST['city']);
            //SQL pour mettre à jour la DB
            $db = connectionBD();
            $sql ="UPDATE `account` SET `acc_name` = '". $name . "', `acc_surname` = '" . $surname . "', `acc_address` = '" . $address . "', `acc_city` = '" . $city . "', `acc_id_country` = '" . $country ."' WHERE `account`.`acc_id` = '". $_SESSION["idAccount"] . "'";
            $db->exec( $sql );
            //Update Session avec les nouvelles valeurs.
            $_SESSION['surname'] = $surname;
            $_SESSION['name'] = $name;
            $_SESSION['address'] = $address;
            $_SESSION['city'] = $city;
            $_SESSION['country'] = $country;
            // $msg_succes = "Vos informations ont été modifiés avec succès.";
            header('Location: ../message.php?success=104');
        }
        // Gestion de l'envoi du mail de contact
        if (isset( $_POST['btnContact'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);
            $subject = htmlspecialchars($_POST['subject']);
            $content="De la part : $name \n Email: $email \n Message: $message";
            $recipient = "contact@belle-nuit.be";
            $mailheader = "de: $email \r\n";
            // mail($recipient, $subject, $content, $mailheader) or die("Erreur!");
            // $msg_succes = "Votre message a été envoyé, nous y répondrons dans un délais de 24 h ouvrables.";
            header('Location: ../message.php?success=105');
        }
        if (isset( $_POST['btnEditAdmin'])) {
            // Verification et sécurisation des nouvelles données.
            $surname = htmlspecialchars($_POST['surname']);
            $name = htmlspecialchars($_POST['name']);
            $address = htmlspecialchars($_POST['address']);
            $country = htmlspecialchars($_POST['country']);
            $city = htmlspecialchars($_POST['city']);
            //SQL pour mettre à jour la DB
            $db = connectionBD();
                if(!isset($_POST['admin'])){
                    $admin = 0;
                } else {
                    $admin = htmlspecialchars($_POST['admin']); 
                }
                if(!isset($_POST['active'])){
                    $active = 0;
                } else {
                    $active = htmlspecialchars($_POST['active']);
                }
            // Requête pour mettre à jour le profil dans la section Admin.
            $sql ="UPDATE `account` SET `acc_name` = '". $name . "', `acc_surname` = '" . $surname . "', `acc_address` = '" . $address . "', `acc_city` = '" . $city . "', `acc_id_country` = '" . $country ."' , `acc_admin` = '" . $admin ."' , `acc_active` = '" . $active ."'  WHERE `account`.`acc_id` = '". $_SESSION['idProfilEdit'] . "'";
            $db->exec( $sql );
            // $msg_succes = "Vos informations ont été modifiés avec succès.";
            header('Location: ../message.php?success=106');
        }
        if (isset( $_POST['btnEditBed'])) {
            $name = htmlspecialchars($_POST['name']);
            $description = $_POST['description'];
            $typeBed = htmlspecialchars($_POST['typeBed']);
            $category = htmlspecialchars($_POST['category']);
            $price = htmlspecialchars($_POST['price']);
            // Mettre à jour la bedroom
            $db = connectionBD();
            //   $msg_succes = "Admin --- La chambre a été modifié avec succès.";
            $sql = "UPDATE `bedroom` SET `bedroom_name` = '". $name . "', `bedroom_description` = '" . $description . "', `bedroom_bed` = '" . $typeBed . "', `id_roomcategory` = '" . $category . "', `bedroom_priceday` = '" . $price ."'  WHERE `bedroom`.`bedroom_id` = ". $_SESSION['idBedroomEdit'] . ";";
            $db->exec( $sql );            
            header('Location: ../message.php?success=107');
        }
        if (isset( $_POST['btnAddBed'])) {
            $name = htmlspecialchars($_POST['name']);
            $description = $_POST['description'];
            $typeBed = htmlspecialchars($_POST['typeBed']);
            $category = htmlspecialchars($_POST['category']);
            $price = htmlspecialchars($_POST['price']);
            // Requête pour rajouter la nouvelle chambre
            $sql = "INSERT `bedroom` SET `bedroom_name` = '". $name . "', `bedroom_description` = '" . $description . "', `bedroom_bed` = '" . $typeBed . "', `id_roomcategory` = '" . $category . "', `bedroom_priceday` = '" . $price ."'";
            $db = connectionBD();
            $db->exec( $sql ); 
            // $msg_succes = "Admin --- Chambre rajouté avec succès.";           
            header('Location: ../message.php?success=108');
        }
        if(isset($_POST['btnAddPic'])){
            if(isset($_FILES['image']) && $_FILES['image']['error'] ==0){  //l'image existe et a été stockée temporairement sur le serveur

                if ($_FILES['image']['size']<= 3000000){ //l'image fait moins de 3MO
            
                    $informationsImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $informationsImage['extension'];
                    // Extensions qu'on autorise
                    $extensionsArray = array('png', 'gif', 'jpg', 'jpeg','webp'); 
                    
                    // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    if(in_array($extensionImage, $extensionsArray)){ //
            
                        move_uploaded_file($_FILES['image']['tmp_name'], '../ressources/images/chambres/uploads/'.time().basename($_FILES['image']['name'])); // on renomme notre image avec une clé unique suivie du nom du fichier
                        // Rajouter la photo dans la table picture
                        $db = connectionBD();
                        $sql = "INSERT `picture` SET `picture_name` = '". $_FILES['image']['name'] . "', `picture_url` = 'ressources/images/chambres/uploads/" . time().basename($_FILES['image']['name']) . "', `picture_description` = '" . $_FILES['image']['name'] . "'";
                        $db->exec( $sql ); 
                        // requête pour récupérer la dernière valeur d'entrée du tableau de l'id picture
                        $stmt = $db->prepare('
                        SELECT `picture_id` FROM `picture` ORDER BY `picture`.`picture_id` DESC'
                        );
                        $stmt->execute();
                        $idpicture = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // la requête pour lier la photo avec l'id de la chambre dans la gallery
                        $sql = "INSERT `gallery` SET `id_picture` = '". $idpicture[0]['picture_id'] . "', `id_bedroom` = '". $_SESSION['idEditPic'] ."'";
                        $db->exec( $sql );     
                        //  $msg_succes = "Admin --- Photo rajouté avec succès.";
                        header('Location: ../message.php?success=109');
                    }
                }
            }
        }