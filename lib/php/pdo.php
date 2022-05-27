<?php
function connectionBD()
{
	try
	{
		$connection = new PDO('mysql:host=localhost;dbname=hotel','root','');
		$connection->exec('SET NAMES utf8');

		return $connection;
	}
	catch(Exception $e) 
	{
		echo '<erreur>Erreur [001]: Impossible de se connecter à la BD, veuillez contacter votre administrateur!</erreur><br/>';		
		echo '<erreur>Erreur : '.$e->getMessage().'</erreur><br/>';
		echo '<erreur>N° : '.$e->getCode().'</erreur><br/>';			
		exit();
	}   		
}
?>