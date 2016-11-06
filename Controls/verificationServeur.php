<?php
//retourne 0 si tout les champs sont rempli
//retourne 1 sinon
function verifFullfill()
{
	$password = mysqli_real_escape_string(htmlspecialchars($_POST['password']));
	$username = mysqli_real_escape_string(htmlspecialchars($_POST['username']));
	$nom = mysqli_real_escape_string(htmlspecialchars($_POST['nom']));
	$prenom = mysqli_real_escape_string(htmlspecialchars($_POST['prenom']));
	$password2 = mysqli_real_escape_string(htmlspecialchars($_POST['passwordCheck']));
	$phone = mysqli_real_escape_string(htmlspecialchars($_POST['phone']));
	$address = mysqli_real_escape_string(htmlspecialchars($_POST['address']));
	if($password == "" || $username == "" || $nom == "" || $prenom == "" || $password2 == "" || $phone == "" || $address == "")
	{
		return 1;
	}
	return 0;
}

function verifPassword()
{
	$password = mysqli_real_escape_string(htmlspecialchars($_POST['password']));
    $password2 = mysqli_real_escape_string(htmlspecialchars($_POST['passwordCheck']));
	return $password == $password2;
}

// retourne 0 si c'est OK
// retourne 1 si le format c'est pas bon
// retourn 2 si l'email est déja utilisé
function verifEmail()
{
	global $DB;
	$email = mysqli_real_escape_string(htmlspecialchars($_POST['email']));
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
	$username = mysqli_real_escape_string(htmlspecialchars($_POST['username']));
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