<?php 
    require_once("../lib/php/fonctions.php");
    require_once("../lib/php/pdo.php");
    
    if( isset( $_POST['btnRegistration']) ) // Le visiteur viens du formulaire INSCRIPTION
        {
            $surname = htmlspecialchars($_POST['surname']);
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $address = htmlspecialchars($_POST['address']);
            $country = htmlspecialchars($_POST['country']);
            $city = htmlspecialchars($_POST['city']);

            // Permet de crypter un mot de pass.
            $password = EncryptPassword($password);
            // Code généré pour permettre d'avoir un code unique pour valider son compte.
            $codeactivation = hash('md2', 'Hello'. rand(5000, 10000) . 'Inscription');
            $db = connectionBD();

            // Création de la requête sql
            // `account`(`acc_id`, `acc_name`, `acc_surname`, `acc_address`, `acc_city`, `acc_id_country`, `acc_email`, `acc_password`, `acc_code_activation`, `acc_admin`, `acc_active`)

            $sql = "INSERT INTO account VALUES (null,'$name','$surname','$address','$city', '$country','$email','$password', '$codeactivation', 0,0)";

            $nbr = $db->exec( $sql );

            if( $nbr > 0 )
            {
                header('Location: message.php?success=101');	
            }
            else
            {
                $msg = "Probléme dans l'inscription !";
                header('refresh:3;url=../inscription.php');
            }
        }
    if (isset( $_POST['btnConnection'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        echo $email ." <br>" ;
        echo $password . "<br>";
        
    }

