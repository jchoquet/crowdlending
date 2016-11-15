<?php

include __DIR__ . '/../Models/connexion.php';
include __DIR__ . '/ConnexionUser.php';

try
  {
	/* Si tous les champs sont renseignés */

	if(isset($_POST['username']) && isset($_POST['mdp']))
	{

    $id=getIdUser($_POST['username']);
		$mdp=$_POST['mdp'];

		$hash=GetPswUser($DB,$id);

		if (password_verify($mdp, $hash))
		{
			/* le mot de passe correspond donc l'utilisateur existe et la connexion peut être établie */

			session_start();
			$_SESSION['login']=$id;
			$_SESSION['pwd']=$hash;
			$_SESSION['username']=$username;

		  header('location: ../acceuil.php');

		}
        else {
            echo "Erreur identifiant ou mot de passe";
        }
	}

	/* On ferme la connexion */

	$DB = null;
}
catch(PDOException $e){
	echo "Database Error";
}


?>
