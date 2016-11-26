<?php

include __DIR__ . '/../Models/connexion.php';
session_start();

$titre = $_POST['titre'];
$description = $_POST['description'];

$id = $_SESSION['login'];

if (verifFullfill()== 0 && verifTitre()== 0 && verifDescription()== 0)
{
    global $DB;
    $titre = $DB->quote(htmlspecialchars($_POST['titre']));
    $description = $DB->quote(htmlspecialchars($_POST['description']));
    $owned = $_SESSION['login'];
    //$id = max_id() + 1 ;
    $id=102;
    $path_photo = 'photo';
    $isAvailable = 1;
    $prix = 0;
    $sql = $DB->prepare("INSERT INTO objet (id ,nom,prix, path_photo, id_owner, isAvailable, description) VALUES (:id , :titre, :prix , :path_photo , :owned, :isAvailable, :description) ON DUPLICATE KEY UPDATE id = :id");
    $sql->bindValue(':id', $id , PDO::PARAM_INT);
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
        // DÃ©but de la session
        session_start ();

        // Redirection vers la page mesObjets si tout s'est bien passé
        echo "L'ajout s'est bien déroulé.\n";
        echo "<a href=\"../Views/mesObjets.php\">Ma liste d'objets</a>";
        header('location: ../Views/mesObjets.php');
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

?>