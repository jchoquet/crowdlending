<?php
include __DIR__ . '/../Models/connexion.php';
session_start();


//Récupération des données de post
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$username = $_POST['username'];
$numero_telephone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$commune = $_POST['commune'];
$id = $_SESSION['login'];
$id_commune = 33454;
$pwd=$_SESSION['pwd'];


if(isset($_POST['oldmdp']) && !isset($_POST['nmdp']))
{
    if (password_verify($_POST['oldmdp'], $pwd))
    {
        echo "OK";
    }
    else{
        echo "Mot de passe incorrect";
    }
}


// Redirection vers la page d'accueil si tous les tests sont passés, ou vers la page d'inscription sinon
if (verifFullfill() == 0  && verifEmail() == 0 && verifUsername() == 0) {
    global $DB;
    // Enregistrement du nouvel utilisateur dans la BD
    $mdp=$_POST['nmdp'];
    $safemdp = password_hash($mdp, PASSWORD_DEFAULT);
    //Préparation de la requête d'insertion du nouvel utilisateur
    $sql = $DB->prepare("UPDATE utilisateur SET username=\"$username\" , hash_password =\"$safemdp\", prenom =\"$prenom\", nom =\"$nom\", email =\"$email\", id_commune = \"$id_commune\" ,  adresse=\"$adresse\"  ,description = \"$description\" WHERE id=\"$id\"");
    $result = $sql->execute();
    //Si des villes ont été trouvées, on stocke l'ID qui lui correspond dans $id_commune
    if ($result) {
        echo "cool";
        header('location: ../acceuil.php');
    } else {
        echo "not cool";
        header('location: ../ajout.php');
    }
}
else {
    echo "Il y a eu un problème lors de votre modification , veuillez cliquer sur le lien ci\n";
}
function verifFullfill()
{
    global $DB;
    $username = $DB->quote($_POST['username']);
    $nom = $DB->quote($_POST['nom']);
    $prenom = $DB->quote($_POST['prenom']);
    $email = $DB->quote($_POST['email']);
    $phone = $DB->quote($_POST['phone']);
    $address = $DB->quote($_POST['address']);
    $commune = $DB->quote($_POST['commune']);
    if( $username == "" || $nom == "" || $prenom == "" ||  $phone == "" || $address == "" || $commune == "")
    {
        return 1;
    }
    return 0;
}
// retourne 0 si c'est OK
// retourne 1 si le format c'est pas bon
// retourne 2 si l'email est déja utilisé
function verifEmail()
{
    global $DB;
    $email = $DB->quote(htmlspecialchars($_POST['email']));
    $domain = strstr($email, '@');
    $user = strstr($email, '@', true);
    $end = strstr($domain, '.');
    if ($user!=FALSE && $end!=FALSE)
    {
        $reponse = $DB->query('SELECT email FROM utilisateur');
        while ($donnees = $reponse->fetch())
        {
            if ($email == $donnees['email'])
            {
                return 2;
            }
        }
        return 0;
    }
    else
    {
        return 1;
    }
}
//retourne 0 si jamais utilisé
//retourn 1 si déjà présent dans la base
function verifUsername()
{
    global $DB;
    $username = $DB->quote(htmlspecialchars($_POST['username']));
    $reponse = $DB->query('SELECT username FROM utilisateur');
    while ($donnees = $reponse->fetch())
    {
        if ($username == $donnees['username']){
            return 1;
        }
    }
    return 0;
}
?>