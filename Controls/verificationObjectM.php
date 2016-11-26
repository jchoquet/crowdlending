<?php

include __DIR__ . '/../Models/connexion.php';
// L'id de l'utilisateur connecté est connu grà¢ce à  session_start() lancé au moment de la connexion


$titre = $_POST['titre'];
$description = $_POST['description'];
$id_to_modifier = $infor[2]; // l'id de l'objet qu'on doit récuperer !!
$id = $_SESSION['login'];
$path_photo = 'photo'; // le path  de la photo en attendant le document final de khushas
$isAvailable = 1;
$prix = 0;



if (verifFullfill()== 0 && verifTitre()== 0 && verifDescription()== 0)
{
    global $DB;

    $titre = $DB->quote(htmlspecialchars($_POST['titre']));
    $description = $DB->quote(htmlspecialchars($_POST['description']));
    $id_to_modifier = $infor[2]; // l'id de l'objet qu'on doit récuperer !!
    $id = $_SESSION['login'];
    $path_photo = 'photo'; // le path  de la photo en attendant le document final de khushas
    $isAvailable = 1;
    $prix = 0;

    $sql = $DB->prepare("UPDATE objet SET id=\"$id_to_modifier\" , nom =\"$titre\", prix =\"$prix\", path_photo = \"$path_photo\" ,  id_owner=\"$id\" , isAvailable =\"$isAvailable\" ,description = \"$description\" WHERE id=\"$id_to_modifier\"");
    $sql->bindValue(':id', $id , PDO::PARAM_INT);
    $sql->bindValue(':titre',$titre, PDO::PARAM_STR);
    $sql->bindValue(':prix', $prix , PDO::PARAM_INT);
    $sql->bindValue(':path_photo', $path_photo, PDO::PARAM_STR);
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->bindValue(':isAvailable', $isAvailable, PDO::PARAM_INT);
    $sql->bindValue(':description', $description, PDO::PARAM_STR);

    //Execution de la requÃªte d'enregistrement de l'utilisateur
    $result = $sql->execute();
    //Redirection vers la page d'accueil si tout s'est bien passÃ©
    if($result)
    {
        // DÃ©but de la session
        session_start ();

        // Redirection vers la page mes objets si tout s'est bien passÃ©
        echo "La modification s'est bien déroulé. Retour à  la page mes objets :\n";
        echo "<a href=\"../Views/mesObjets.php\">Mes objets</a>";
        header('location: ../Views/mesObjets.php');
    }
    else
    {
        echo "Il y a eu un problème lors de votre modification d'objet, veuillez cliquer sur le lien ci\n";
        echo "<a href=\"../Views/mesObjets.php\">Mes objets</a>";
    }
}

//Redirection vers la page mes objets si les champs ne sont pas valides
else
    {
    echo "Il y a eu un problème lors de votre modification d'objet, veuillez cliquer sur le lien ci\n";
    echo "<a href=\"../Views/mesObjets.php\">Mes objets</a>";
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


// Renvoie le nom de l'objet qui va être modifié, d'id "id_to_modifier"
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
}


?>