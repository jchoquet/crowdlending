<?php

include __DIR__ . '/../Models/connexion.php';
session_start();

$titre = $_POST['titre'];
$description = $_POST['description'];
$id = $_SESSION['login'];

if (verifFullfill()== 0 && verifTitre()== 0 && verifDescription()== 0 && verifPhoto()==0)
{
    global $DB;
    $titre = $DB->quote(htmlspecialchars($_POST['titre']));
    $description = $DB->quote(htmlspecialchars($_POST['description']));
    $owned = $_SESSION['login'];
	if(isset($_FILES['photo']['tmp_name'])){
		$nom = md5(uniqid(rand(), true));
		$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
		$path_photo = "Images/Objets/".$nom.$extension_upload;
		$moving = move_uploaded_file($_FILES['photo']['tmp_name'],"../".$nom);
	}
    $isAvailable = 1;
    $prix = 0;
    $sql = $DB->prepare("INSERT INTO objet (nom,prix, path_photo, id_owner, isAvailable, description) VALUES (:titre, :prix , :path_photo , :owned, :isAvailable, :description);");
    $sql->bindValue(':titre',$titre, PDO::PARAM_STR);
    $sql->bindValue(':prix', $prix , PDO::PARAM_INT);
    $sql->bindValue(':path_photo', $path_photo, PDO::PARAM_STR);
    $sql->bindValue(':owned', $owned, PDO::PARAM_INT);
    $sql->bindValue(':isAvailable', $isAvailable, PDO::PARAM_INT);
    $sql->bindValue(':description', $description, PDO::PARAM_STR);

    //Execution de la requÃªte d'enregistrement de l'utilisateur
    $result = $sql->execute();
    //Redirection vers la page d'accueil si tout s'est bien passÃ©
    if($result)
    {
		if(isset($_POST['categorie'])){
			$queryObjet = $DB->prepare("SELECT id FROM objet WHERE id_owner=:owned AND nom=:titre;")
			$queryObjet->bindValue(':owned',$owned, PDO::PARAM_INT);
			$queryObjet->bindValue(':titre',$titre, PDO::PARAM_STR);
			$queryObjet->execute();
			$result = $queryObjet->fetch();
			$idobjet = $result['id'];
			
			
			$querycate = $DB->prepare("SELECT id FROM categorie WHERE nom=:titre;")
			$querycate->bindValue(':titre',$_POST['categorie'], PDO::PARAM_STR);
			$querycate->execute();
			$result = $querycate->fetch();
			$idcategorie = $result['id'];
			
			
			$query = $DB->prepare("INSERT INTO categorisation (id_categorie,id_objet) VALUES (:id_categorie, :id_objet);");
			$query->bindValue(':id_categorie',$idcategorie, PDO::PARAM_STR);
			$query->bindValue(':id_objet', $idobjet, PDO::PARAM_INT);
			$query->execute();
		}
        // DÃ©but de la session
        session_start ();

        // Redirection vers la page mesObjets si tout s'est bien passé
        echo "L'ajout s'est bien déroulé.\n";
        echo "<a href=\"../mesObjets.php\">Ma liste d'objets</a>";
        header('location: ../mesObjets.php');
    }
    else
    {
        echo "Il y a eu un problème lors de votre ajout d'objet, veuillez cliquer sur le lien ci\n";
        echo "<a href=\"../Views/Ajout.php\">Page d'ajout d'objet</a>";
    }
}
//Redirection vers la page d'ajout si les champs ne sont pas valides.
else {
    echo "Il y a eu un problème lors de votre ajout d'objet, veuillez cliquer sur le lien ci\n";
    echo "<a href=\"../Views/Ajout.php\">Page d'ajout d'objet</a>";}


//retourne 0 si tout les champs sont rempli
//retourne 1 sinon
function verifFullfill()
{
    $titre = $_POST['titre'];
    if ($titre== "")
    {
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
			return 1;
		}
		
		$maxsize=100000;
		if ($_FILES['photo']['size'] > $maxsize)
		{
			return 1;
		}
		
		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
		if (!in_array($extension_upload,$extensions_valides))
		{ 
			return 1;
		}
		
		$image_dim = getimagesize($_FILES['photo']['tmp_name']);
		$maxwidth=64;
		$maxheight=64;
		if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
		{
			return 1;
		}
		
		return 0;
		
	}
	else return 0;
}

?>