<?php

include __DIR__ . '/../Models/connexion.php';
include __DIR__ . "/../Models/mesObjetsGet.php";
include __DIR__ . "/../Models/mesobjetsM.php";


$titre = $_POST['titre'];
$description = $_POST['description'];
$id_to_modifier = $_POST['identifiantObjet']; // l'id de l'objet qu'on doit récuperer !!
//$id = $_SESSION['login'];
//$path_photo = 'no_image.png'; // le path  de la photo en attendant le document final de khushas
//$isAvailable = 1;
//$prix = 0;

if($_FILES['photo']['name'] != "")
{
    // Création d'un nom aléatoire pour la photo
    $nom = md5(uniqid(rand(), true));
    $extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
    $path_photo = $nom . "." . $extension_upload;
    $moving = move_uploaded_file($_FILES['photo']['tmp_name'],"../Images/Objets/" . $path_photo);
    
    // Suppression de l'ancien fichier de photo s'il ne s'agit pas de la photo par défaut
    $ancien_path_photo = getphoto($id_to_modifier);
    if ($ancien_path_photo != "no_image.png")
    {
        $path_to_delete = "../Images/Objets/" . $ancien_path_photo;
        if (is_writable($path_to_delete))
            unlink($path_to_delete);
    }
}
else
    $path_photo = getphoto($id_to_modifier);



if (verifFullfill()== 0 && verifTitre()== 0 && verifDescription()== 0)
{
   /* $titre = $DB->quote(htmlspecialchars($_POST['titre']));
    $description = $DB->quote(htmlspecialchars($_POST['description']));*/

    $result = modifier_objet($id_to_modifier, $titre, $path_photo, $description);

    //Redirection vers la page d'accueil si tout s'est bien passÃ©
    if($result)
    {

        // Redirection vers la page mes objets si tout s'est bien passÃ©
        $message = "L'objet ".$titre." a bien été modifié.";
        $_SESSION['message'] = $message;
        header('location: ../mesObjets.php');

    }
    else
    {
        $message = "Il y a eu un problème lors de votre modification d'objet.";
        $_SESSION['message'] = $message;
        header('location: ../mesObjets.php');
    }
}

//Redirection vers la page mes objets si les champs ne sont pas valides
else
{
    $message = "Il y a eu un problème lors de votre modification d'objet.";
    $_SESSION['message'] = $message;
    header('location: ../mesObjets.php');
}


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


/*// Renvoie le nom de l'objet qui va être modifié, d'id "id_to_modifier"
function objet_to_modifier($id_to_modifier)
{
    global $DB;
    return $DB->query("SELECT nom from objet WHERE id=\"$id_to_modifier\"")->fetch()[0];
}

//modifier l'objet d'id "id_to_delete"

function modifier_objet($id_to_modifier , $titre , $prix , $isAvailable , $path_photo , $description )
{
    global $DB;
    $id = $_SESSION['login'];
    $qr = $DB->prepare("UPDATE objet SET id=\"$id_to_modifier\" , nom =\"$titre\", prix =\"$prix\", path_photo = \"$path_photo\" ,  id_owner=\"$id\" , isAvailable =\"$isAvailable\" ,description = \"$description\" WHERE id=\"$id_to_modifier\"");
    $result = $qr->execute();
    return $result;
}*/


?>