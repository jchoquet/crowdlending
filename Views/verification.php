<?php

include __DIR__ . '/../Models/connexion.php';


$titre = $_POST['titre'];
$description = $_POST['description'];


//retourne 0 si tout les champs sont rempli
//retourne 1 sinon
function verifFullfill()
{
    global $DB ;
    $titre = $DB->quote(htmlspecialchars($_POST['titre']));
    $description = $DB->quote(htmlspecialchars($_POST['description']));
    if ($titre == "" || $description == "" )
    {
        return 1;
    }
    return 0;
}

// retourne 0 si c'est OK
// retourne 1 si c'est trop long
function verifDescription()
{
    global $DB;
    $description = $DB->quote(htmlspecialchars($_POST['description']));
    if (strlen($description) > 500)
    {
        return 1;
    }
    return 0;

}


//retourne 0 si OK
//retourne 1 sinon
function verifTitre()
{
    global $DB;
    $titre = htmlspecialchars($_POST['titre']);
    if (strlen($titre) > 255)
    {
        return 1;
    }
    return 0;
}


session_start();

if (verifFullfill()== 0 && verifTitre()== 0 && verifDescription()== 0)
{
    global $DB;
    $titre = $DB->quote(htmlspecialchars($_POST['titre']));
    $description = $DB->quote(htmlspecialchars($_POST['description']));
    $owned = $_SESSION['login'];
    $id = 30;
    $path_photo = 'photo';
    $isAvailable = 1;
    $sql = $DB->prepare("INSERT INTO objet (id ,nom, path_photo, id_owner, isAvailable, description) VALUES (:id , :titre, :path_photo , :owned, :isAvailable, :description)");
    $sql->bindValue(':id', $id , PDO::PARAM_INT);
    $sql->bindValue(':titre',$titre, PDO::PARAM_STR);
    $sql->bindValue(':path_photo', $path_photo, PDO::PARAM_STR);
    $sql->bindValue(':id_owned', $owned, PDO::PARAM_INT);
    $sql->bindValue(':isAvailable', $isAvailable, PDO::PARAM_INT);
    $sql->bindValue(':description', $description, PDO::PARAM_STR);
    //Execution de la requête d'enregistrement de l'utilisateur
    $result = $sql->execute();
    //Redirection vers la page d'accueil si tout s'est bien passé
    if($result)
    {
        // Début de la session
        session_start ();

        // Redirection vers la page d'accueil si tout s'est bien passé
        echo "L'ajout s'est bien déroulé. Retour à la page d'ajour :\n";
        echo "<a href=\"../Views/inscription.php\">Page d'inscription</a>";
        header('location: ../acceuil.php');
    }
    else
    {
        echo "Il y a eu un problème lors de votre ajout d'objet, veuillez cliquer sur le lien ci\n";
        echo "<a href=\"../Views/Ajout.php\">Page d'ajout d'objet</a>";
    }
}
//Redirection vers la page d'inscription si les champs ne sont pas valides
else {
    echo "Il y a eu un problème lors de votre ajout d'objet, veuillez cliquer sur le lien ci\n";
    echo "<a href=\"../Views/Ajout.php\">Page d'ajout d'objet</a>";}

?>