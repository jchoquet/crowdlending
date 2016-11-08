<?php
/**
 * Created by PhpStorm.
 * User: Mehdi Khadir
 * Date: 06/11/2016
 * Time: 19:09
 */
include __DIR__ . '/verificationServeur.php';

// Redirection vers la page d'accueil si tous les tests sont passés, ou vers la page d'inscription sinon
if (verifFullfill() == 0 && verifPassword() && verifEmail() == 0 && verifUsername() == 0)
{
    global $DB, $password, $username, $nom, $prenom, $password2, $phone, $address, $email, $commune;

    //Hashage du mot de passe
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    // Enregistrement du nouvel utilisateur dans la BD

    //Préparation de la requête d'insertion du nouvel utilisateur
    $sql = $DB->prepare("INSERT INTO utilisateur (username, prenom, nom, email, hash_password, id_commune) VALUES (:username, :prenom, :nom, :email, :hashpassword, :id_commune)");
    $sql->bindValue(':username', $username, PDO::PARAM_STR);
    $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sql->bindValue(':email', $email, PDO::PARAM_STR);
    $sql->bindValue(':hashpassword', $hashpassword);

    //Préparation de la requête de recherche de l'id de la ville de l'utilisateur
    $reqId = $DB -> prepare("SELECT id FROM commune WHERE nom = $commune LIMIT 1");

    //Execution et récupération de cet id
    $reqId->execute();

    if ($reqId->rowCount() > 0)
    {
        //Cas où la commune a été trouvée, son id est stocké dans $id_commune
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
