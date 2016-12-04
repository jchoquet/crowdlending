<?php
/**
 * Created by PhpStorm.
 * User: Mehdi Khadir
 * Date: 06/11/2016
 * Time: 19:09
 */
include __DIR__ . '/verificationServeur.php';
include __DIR__ . "/ConnexionUser.php";

//Récupération des données de post
$username = $_POST['username'];
$password = $_POST['password'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$commune = $_POST['commune'];
$id_commune = -1;


// Redirection vers la page d'accueil si tous les tests sont passés, ou vers la page d'inscription sinon
if (verifFullfill() == 0  && verifPassword() && verifEmail() == 0 && verifUsername() == 0 && verifPhone()==0)
{
    global $DB;

    //Hashage du mot de passe
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    // Enregistrement du nouvel utilisateur dans la BD

    //Préparation de la requête d'insertion du nouvel utilisateur
    $sql = $DB->prepare("INSERT INTO utilisateur (username, prenom, nom, email, hash_password, id_commune, adresse, numero_telephone) VALUES (:username, :prenom, :nom, :email, :hashpassword, :id_commune, :adresse, :numero_telephone)");
    $sql->bindValue(':username',$username, PDO::PARAM_STR);
    $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sql->bindValue(':email', $email, PDO::PARAM_STR);
    $sql->bindValue(':hashpassword', $hashpassword, PDO::PARAM_STR);
    $sql->bindValue('adresse', $address, PDO::PARAM_STR);
    $sql->bindValue('numero_telephone', $phone, PDO::PARAM_STR);


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
        $erreur = "commune";
        header("Location: ../Controls/inscription.php?err=$erreur");
    }
    $sql->bindValue(':id_commune', $id_commune);


    //Execution de la requête d'enregistrement de l'utilisateur
    $result = $sql->execute();

    if($result)
    {
        // Début de la session
        session_start ();
        $_SESSION['login'] = GetIdUser($username);
        $_SESSION['username'] = $username;
        $_SESSION['pwd'] = $hashpassword;

        // Redirection vers la page d'accueil si tout s'est bien passé
        header('location: ../acceuil.php');
    }
    else
    {
        //Cas d'erreur quelconque
        $erreur = "inconnue";
        header("Location: ../Controls/inscription.php?err=$erreur");
    }

}
//Redirection vers la page d'inscription si les champs ne sont pas valides
else {
    echo "Il y a eu un problème lors de votre inscription, veuillez cliquer sur le lien ci\n";
    echo "<a href=\"inscription.php\">Page d'inscription</a>";
}
?>
