<?php


function connexionUser($db,$id)
  {

	$stmt = $db->prepare("SELECT hash_password FROM utilisateur WHERE identifiant=:id");
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_OBJ);
  $stmt = $stmt->fetch();
  return $stmt->hash_password;
  }

try
  {
  
	$DB = new PDO("pgsql:host=localhost;dbname=projet_web", "postgres", "root");

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
