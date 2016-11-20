<?php

if (verifFullfill() && verifTitre() && verifPrix() && verifDescription() && verifPhoto())
{
	global $DB;
	$titre = mysql_real_escape_string(htmlspecialchars($_POST['titre']));
	$prix = mysql_real_escape_string(htmlspecialchars($_POST['prix']));
	$description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
	$photo_nom = mysql_real_escape_string(htmlspecialchars($_FILES['photo']['tmp_name']));
    // Enregistrement du nouvel objet r dans la BD
    //Préparation de la requête d'insertion du nouvel objet
	//On récupere l'ID de l'enregistreur avant
	$email = $DB->quote(htmlspecialchars($_POST['email']));
	$reponse = $DB->prepare('SELECT id FROM utilisateur WHERE email = :email');
	$sql->bindValue(':email',$email, PDO::PARAM_STR);
	$sql->execute();
	$donnees = $reponse->fetch();
	$owned = $donnees['id'];
    $sql = $DB->prepare("INSERT INTO objet (nom, prix, path_photo, id_owner, isAvailable, description) VALUES (:nom, :prix, :path_photo, :id_owner, 1, :description)");
    $sql->bindValue(':titre',$titre, PDO::PARAM_STR);
    $sql->bindValue(':prix', $prix, PDO::PARAM_STR);
    //$sql->bindValue(':path_photo', $photo_nom, PDO::PARAM_STR); : IMPORTANT TODO : CONFIGURER LE PATH FICHIER SUR LE SERVEUR
    $sql->bindValue(':id_owned', $owned, PDO::PARAM_INT);
    $sql->bindValue(':isAvailable', 1, PDO::PARAM_INT);
	$sql->bindValue(':description', $description, PDO::PARAM_STR);
    //Execution de la requête d'enregistrement de l'utilisateur
    $sql->execute();
    //Redirection vers la page d'accueil si tout s'est bien passé
    echo "L'ajout s'est bien déroulé. Retour à la page d'ajour :\n";
    echo "<a href=\"../Views/Ajout.php\">Page d'ajout d'objet</a>";
}
//Redirection vers la page d'inscription si les champs ne sont pas valides
else {
    echo "Il y a eu un problème lors de votre ajout d'objet, veuillez cliquer sur le lien ci\n";
    echo "<a href=\"../Views/Ajout.php\">Page d'ajout d'objet</a>";
}
}

//retourne 0 si tout les champs sont rempli
//retourne 1 sinon
function verifFullfill()
{
	$titre = mysql_real_escape_string(htmlspecialchars($_POST['titre']));
	$prix = mysql_real_escape_string(htmlspecialchars($_POST['prix']));
	$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
	$description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
	$photo_nom = mysql_real_escape_string(htmlspecialchars($_FILES['photo']['tmp_name']));
	if ($titre == "" || $prix == NULL || $email == "" || $description == "" || $photo_nom == "")
	{
		return 1;
	}
	return 0;
}

//retourne 0 si OK
//retourne 1 sinon
function verifTitre()
{
	$titre = mysql_real_escape_string(htmlspecialchars($_POST['titre']));
	if (strlen($titre) > 255)
	{
		return 1;	
	}
	return 0;
}

// retourne 0 si c'est OK
// retourne 1 si le prix est négatif
function verifPrix()
{
	$prix = mysql_real_escape_string(htmlspecialchars($_POST['prix']));
	if ($prix < 0)
	{
		return 0;
	}
	return 1;
}

// retourne 0 si c'est OK
// retourne 1 si le format c'est pas bon
// retourn 2 si l'email est déja utilisé
function verifEmail()
{
	$email = $DB->quote(htmlspecialchars($_POST['email']));
	$domain = strstr($email, '@');
	$user = strstr($email, '@', true);
	$end = strstr($domain, '.');
	if ($user!=FALSE && $end!=FALSE)
	{
		$reponse = $DB->query('SELECT email FROM utilisateur');
		while ($donnees = $reponse->fetch())
		{
			if ($email == $donnees['email'])
			{
				return 2;
			}
		}
		return 0;
	}
	else
	{
		return 1;
	}
}

// retourne 0 si c'est OK
// retourne 1 si c'est trop long
function verifDescription()
{
	$description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
	if (strlen($description) > 500)
	{
		return 1;	
	}
	return 0;
	
}

//retourne 0 si jamais utilisé
//retourn 1 si déjà présent dans la base
function verifPhoto()
{
	$photo_nom = mysql_real_escape_string(htmlspecialchars($_FILES['photo']['name']));
	$photo_size = filesize($_FILES['photo']['tmp_name']);
	if ($photo_size>100000)
	{
		return 1;
	}
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($photo_nom, '.');
	if(!in_array($extension, $extensions))
	{
		return 1;
	}
	$fichier = strtr($fichier,
     'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
     'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
	$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
	return 0;
}
?>