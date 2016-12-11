<?php
/**
 * Created by PhpStorm.
 * User: qianqiuhao
 * Date: 16/12/10
 * Time: 下午1:35
 */
include __DIR__ . '/../Models/connexion.php';
include __DIR__ . "/../Models/mesBesoinsGet.php";
include __DIR__ . "/../Models/mesBesoinsM.php";


$titre = $_POST['titre'];
$description = $_POST['description'];
$id_to_modifier = $_POST['identifiantBesoin']; // l'id de besooin qu'on doit récuperer !!

if($_FILES['photo']['name'] != "")
{
    // Création d'un nom aléatoire pour la photo
    $nom = md5(uniqid(rand(), true));
    $extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
    $path_photo = $nom . "." . $extension_upload;
    $moving = move_uploaded_file($_FILES['photo']['tmp_name'],"../Images/Besoins/" . $path_photo);

    // Suppression de l'ancien fichier de photo s'il ne s'agit pas de la photo par défaut
    $ancien_path_photo = getphoto($id_to_modifier);
    if ($ancien_path_photo != "no_image.png")
    {
        $path_to_delete = "../Images/Besoins/" . $ancien_path_photo;
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

    $result = modifier_besoin($id_to_modifier, $titre, $path_photo, $description);

    //Redirection vers la page d'accueil si tout s'est bien passÃ©
    if($result)
    {

        // Redirection vers la page mes besoins si tout s'est bien passÃ©
        $message = "Le besoin ".$titre." a bien été modifié.";
        $_SESSION['message'] = $message;
        header('location: ../mesBesoins.php');

    }
    else
    {
        $message = "Il y a eu un problème lors de votre modification de besoin.";
        $_SESSION['message'] = $message;
        header('location: ../mesBesoins.php');
    }
}

//Redirection vers la page mes objets si les champs ne sont pas valides
else
{
    $message = "Il y a eu un problème lors de votre modification de besoin.";
    $_SESSION['message'] = $message;
    header('location: ../mesBesoins.php');
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



?>