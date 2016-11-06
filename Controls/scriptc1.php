<?php

include __DIR__ . '/../Models/Connexion.php';
include __DIR__ . '/ConnexionUser.php';


try
  {
  
	/*  $DB = new PDO("pgsql:host=localhost;dbname=pima-proj", "postgres", "root");*/
	$DB = new PDO($DB_TYPE . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_USER, $DB_PASSWORD);

	/* Si tous les champs sont renseignés */
	
	if(isset($_POST['id']) && isset($_POST['mdp']))
	{

		$id=$_POST['id'];
		$mdp=$_POST['mdp'];

		$hash=connexionUser($DB,$id);

		if (password_verify($mdp, $hash)) 
		{
			/* L'utilisateur existe */

			session_start();
			$_SESSION['login']=$id;
			$_SESSION['pwd']=$hash;

		   	echo "OK";
		}
        else 
        {
            echo "Erreur identifiant ou mot de passe";
        } 
	}
		
	/* On ferme la connexion */
	
	$DB = null;
}

catch(PDOException $e)
{
	echo "Database Error";
}

?>