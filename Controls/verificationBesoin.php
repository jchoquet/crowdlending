<?php

include __DIR__ . '/../Models/connexion.php';
session_start();

$titre = $_POST['titre'];
$description = $_POST['description'];
$id = $_SESSION['login'];

print_r($_FILES);
print_r($_POST);

if (verifFullfill()==0 && verifTitre()==0 && verifDescription()==0 && verifPhoto()==0)
{
    global $DB;
   /* $titre = $DB->quote(htmlspecialchars($_POST['titre']));
    $description = $DB->quote(htmlspecialchars($_POST['description']));*/
    $asker = $_SESSION['login'];
  	if($_FILES['photo']['name'] != "")
  	{
  		print("ok\n");
  		$nom = md5(uniqid(rand(), true));
  		$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
  		$path_photo = $nom . "." . $extension_upload;
  		$moving = move_uploaded_file($_FILES['photo']['tmp_name'],"../Images/Besoins/" . $path_photo);
  	}
    else
    {
      $path_photo = 'no_image.png';
    }


    $isAnswered = 0; //Default value
    $sql = $DB->prepare("INSERT INTO besoin (nom, path_photo, id_asker, isAnswered, description) VALUES (:titre, :path_photo , :asker, :isAnswered, :description);");
    $sql->bindValue(':titre',$titre, PDO::PARAM_STR);
    $sql->bindValue(':path_photo', $path_photo, PDO::PARAM_STR);
    $sql->bindValue(':asker', $asker, PDO::PARAM_INT);
    $sql->bindValue(':isAnswered', $isAnswered, PDO::PARAM_INT);
    $sql->bindValue(':description', $description, PDO::PARAM_STR);

    //Execution de la requÃªte d'enregistrement de l'utilisateur
    $result = $sql->execute();
    //Redirection vers la page d'accueil si tout s'est bien passÃ©
    if($result)
    {
		  if($_POST['categorie'] != 0){
  			$queryObjet = $DB->prepare("SELECT id FROM objet WHERE id_asker=:asker AND nom=:titre;");
  			$queryObjet->bindValue(':asker',$asker, PDO::PARAM_INT);
  			$queryObjet->bindValue(':titre',$titre, PDO::PARAM_STR);
  			$queryObjet->execute();
  			$result = $queryObjet->fetch();
  			$idbesoin = $result['id'];


  			$querycate = $DB->prepare("SELECT id FROM categorie WHERE nom=:titre;");
  			$querycate->bindValue(':titre',$_POST['categorie'], PDO::PARAM_STR);
  			$querycate->execute();
  			$result = $querycate->fetch();
  			$idcategorie = $result['id'];


  			$query = $DB->prepare("INSERT INTO categorisation (id_categorie,id_objet) VALUES (:id_categorie, :id_objet);");
  			$query->bindValue(':id_categorie',$idcategorie, PDO::PARAM_STR);
  			$query->bindValue(':id_objet', $idbesoin, PDO::PARAM_INT);
  			$query->execute();
		  }

      // Redirection vers la page d'accueil si tout s'est bien passé
      echo "Votre demande a bien été prise en compte.\n";
      echo "<a href=\"../acceuil.php\">Accueil</a>";
      //header('location: ../mesObjets.php');
    }
    else
    {
        echo "Il y a eu un problème lors de votre demande d'objet (erreur de requête), veuillez cliquer sur le lien ci-dessous\n";
        echo "<a href=\"../Views/besoin.php\">Page de demande d'objet</a>";
    }
}
//Redirection vers la page d'ajout si les champs ne sont pas valides.
else
{
    echo "verif photo egal à";
    echo verifPhoto();
    echo "Il y a eu un problème lors de votre demande d'objet (champs non valides), veuillez cliquer sur le lien ci-dessous \n";
    echo "<a href=\"../Views/besoin.php\">Page de demande d'objet</a>";
}


//retourne 0 si tout les champs sont rempli
//retourne 1 sinon
function verifFullfill()
{
    $titre = $_POST['titre'];
    if ($titre== "")
    {
		print("verifFullfill\n");
        return 1;
    }
    return 0;
}

//retourne 0 si OK
//retourne 1 sinon
function verifTitre()
{
    if (strlen($_POST['titre']) > 255)
    {
		print("verifTitre");
        return 1;
    }
    return 0;
}

// retourne 0 si c'est OK
// retourne 1 si c'est trop long
function verifDescription()
{
    if (strlen($_POST['description']) > 500)
    {
		print("verifDescription");
        return 1;
    }
    return 0;

}

// Renvoie l'id max de la table objet
function max_id()
{
    global $DB;
    $req = $DB->prepare("SELECT MAX(id) from objet");
    $result = $req->execute();
    return $result;
}

function verifPhoto()
{
	if(isset($_FILES['photo']))
	{
		if ($_FILES['photo']['error'] > 0)
		{
			print("photo_error");
			return 0;
		}

		$MAXSIZE = 100000;
		if ($_FILES['photo']['size'] > $MAXSIZE)
		{
			print("photo_size");
			return 1;
		}

		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
		if (!in_array($extension_upload,$extensions_valides))
		{
			print("photo_extension");
			return 1;
		}

		$image_dim = getimagesize($_FILES['photo']['tmp_name']);
		print_r($image_dim);
		$MAXWIDTH = 2000;
		$MAXHEIGHT = 2000;
		if ($image_dim[0] > $MAXWIDTH OR $image_dim[1] > $MAXHEIGHT)
		{
			print("photo_dimensions");
			return 1;
		}

		return 0;

	}
	else return 0;
}

?>