<?php

include __DIR__ . '/../Models/connexion.php';


session_start();
// L'id de l'utilisateur connecté est connu grà¢ce à  session_start() lancé au moment de la connexion


$titre = $_POST['titre'];
$description = $_POST['description'];
$id_to_modifier = $_POST['identifiantObjet']; // l'id de l'objet qu'on doit récuperer !!
$id = $_SESSION['login'];
$path_photo = 'no_image.png'; // le path  de la photo en attendant le document final de khushas
$isAvailable = 1;
$prix = 0;



if (verifFullfill()== 0 && verifTitre()== 0 && verifDescription()== 0)
{
    global $DB;

   /* $titre = $DB->quote(htmlspecialchars($_POST['titre']));
    $description = $DB->quote(htmlspecialchars($_POST['description']));*/

    $sql = $DB->prepare("UPDATE objet SET id=\"$id_to_modifier\" , nom =\"$titre\", prix =\"$prix\", path_photo = \"$path_photo\" ,  id_owner=\"$id\" , isAvailable =\"$isAvailable\" ,description = \"$description\" WHERE id=\"$id_to_modifier\"");

   /* $sql = $DB->prepare("UPDATE objet SET id=:ido, nom=:titre, prix=:prix, path_photo=:path_photo, id_owner=:ids, isAvailable=:isAvailable, description=:description WHERE id=:ido");
    $sql->bindParam(':ido', $id_to_modifier);
    $sql->bindParam(':titre',$titre);
    $sql->bindParam(':prix', $prix);
    $sql->bindParam(':path_photo', $path_photo);
    $sql->bindParam(':ids', $id);
    $sql->bindParam(':isAvailable', $isAvailable);
    $sql->bindParam(':description', $description);*/

    //Execution de la requÃªte d'enregistrement de l'utilisateur
    $result = $sql->execute();
    //Redirection vers la page d'accueil si tout s'est bien passÃ©
    if($result)
    {

        // Redirection vers la page mes objets si tout s'est bien passÃ©
        $message = "L'objet ".$titre." a bien été modifié";
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