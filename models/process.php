<?php 
    require_once("../lib/php/fonctions.php");
    require_once("../lib/php/pdo.php");
    
    if( isset( $_POST['btnRegistration']) ) // Le visiteur viens du formulaire INSCRIPTION
        {
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
            while($email_verification = $Inscription->fetch(PDO::FETCH_ASSOC)) {
                if($email_verification['numberEmail'] != 0) {
                    header('Location: ../message.php?error=705');
                    exit();
                }
            }
            //  Création de la requête sql
            // `account`(`acc_id`, `acc_name`, `acc_surname`, `acc_address`, `acc_city`, `acc_id_country`, `acc_email`, `acc_password`, `acc_code_activation`, `acc_admin`, `acc_active`)
                $sql = "INSERT INTO account VALUES (null,'$name','$surname','$address','$city', '$country','$email','$password', '$codeactivation', 0,0)";
                $nbr = $db->exec( $sql );
                header('Location: ../message.php?success=101');
                exit();
        }

        
    if (isset( $_POST['btnConnection'])) {
        $login = htmlspecialchars($_POST['login']);
        $password = EncryptPassword(htmlspecialchars($_POST['password']));

        $db = connectionBD();

        $Account = $dbt->prepare('SELECT * 
                                    FROM account
                                    WHERE acc_email = :mail');
        $Account->bindValue(':mail', $login, PDO::PARAM_STR);
        $Account->execute();
        $data = $Account->fetchAll(PDO::FETCH_ASSOC);

            // Connection 
            if(!empty($data)) {
                if ($password == $data[0]["acc_password"]  && $data[0]["acc_active"] != 0 ){
                    header("Location: accueil.php");

                    //Init variable pour des fonctions suivantes
                    $_SESSION['mail'] = $mail;
                    $_SESSION['online'] = 1 ; 
                    $_SESSION['surname'] = $data[0]["acc_surname"];
                    $_SESSION['name'] = $data[0]["acc_name"];
                    $_SESSION['levelAccess'] = $data[0]["acc_admin"];
                } else {
                    header("Location: index.php?message=Impossible à se connecter // Contactez un administrateur"); 
                    exit();
                }
            } else {
                echo 'Impossible à se connecter';
            }
        }


            