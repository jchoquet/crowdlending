<?php
/**
 * Created by PhpStorm.
 * User: Mehdi Khadir
 * Date: 06/11/2016
 * Time: 19:09
 */
include __DIR__ . '/verificationServeur.php';

//Récupération des données de post
$username = $_POST['username'];
$password = $_POST['password'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$commune = $_POST['commune'];


// Redirection vers la page d'accueil si tous les tests sont passés, ou vers la page d'inscription sinon
if (verifFullfill() == 0  && verifPassword() && verifEmail() == 0 && verifUsername() == 0 && verifPhone()==0)
{
    global $DB;

    //Hashage du mot de passe
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    // Enregistrement du nouvel utilisateur dans la BD

    //Préparation de la requête d'insertion du nouvel utilisateur
    $sql = $DB->prepare("INSERT INTO utilisateur (username, prenom, nom, email, hash_password, id_commune) VALUES (:username, :prenom, :nom, :email, :hashpassword, :id_commune)");
    $sql->bindValue(':username',$username, PDO::PARAM_STR);
    $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sql->bindValue(':email', $email, PDO::PARAM_STR);
    $sql->bindValue(':hashpassword', $hashpassword, PDO::PARAM_STR);

    //Préparation de la requête de recherche de l'id de la ville de l'utilisateur
    $reqId = $DB -> prepare("SELECT id FROM commune WHERE nom = :commune");
    $reqId->bindValue(':commune',substr($commune, 0, -5));

    //Execution et récupération de cet id
    $reqId->execute();

    //Si des villes ont été trouvées, on stocke l'ID qui lui correspond dans $id_commune
    if ($reqId->rowCount() > 0)
    {
        $check = $reqId->fetch(PDO::FETCH_ASSOC);
        global $id_commune;
        $id_commune = $check['id'];
    }
    else
    {
        //Cas où la commune n'a pas été trouvée
        print("<p> La commune n'a pas été trouvée </p>");
        print("<a href=\"../index.php\">Accueil</a>");
    }
    $sql->bindValue(':id_commune', $id_commune);

    //Execution de la requête d'enregistrement de l'utilisateur
    $sql->execute();

    //Redirection vers la page d'accueil si tout s'est bien passé
    header(__DIR__ . '/../index.php');
}

//Redirection vers la page d'inscription si les champs ne sont pas valides

else {
    echo "Il y a eu un problème lors de votre inscription, veuillez cliquer sur le lien ci\n";
    echo "<a href=\"../Views/inscription.php\">Page d'inscription</a>";
}
?>
