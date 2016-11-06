<?php
include "../Models/Connexion.php";
//retourne 0 si tout les champs sont rempli
//retourne 1 sinon
function verifFullfill()
{
	$password = $DB->quote(htmlspecialchars($_POST['password']));
	$username = $DB->quote(htmlspecialchars($_POST['username']));
	$nom = $DB->quote(htmlspecialchars($_POST['nom']));
	$prenom = $DB->quote(htmlspecialchars($_POST['prenom']));
	$password2 = $DB->quote(htmlspecialchars($_POST['passwordCheck']));
	$phone = $DB->quote(htmlspecialchars($_POST['phone']));
	$address = $DB->quote(htmlspecialchars($_POST['address']));
	if($password == "" || $username == "" || $nom == "" || $prenom == "" || $password2 == "" || $phone == "" || $address == "")
	{
		return 1;
	}
	return 0;
}

function verifPassword()
{
	$password = $DB->quote(htmlspecialchars($_POST['password']));
    $password2 = $DB->quote(htmlspecialchars($_POST['passwordCheck']));
	return $password == $password2;
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

//retourne 0 si jamais utilisé
//retourn 1 si déjà présent dans la base
function verifUsername()
{
	$username = $DB->quote(htmlspecialchars($_POST['username']));
	$reponse = $DB->query('SELECT username FROM utilisateur');
	while ($donnees = $reponse->fetch())
	{
		if ($username == $donnees['username']){
			return 1;
		}
	}
	return 0;
}
?>