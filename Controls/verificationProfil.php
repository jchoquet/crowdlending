<?php
include __DIR__ . '/../Models/connexion.php';
include __DIR__ . "/../Models/monProfil.php";

session_start();


//Récupération des données de post
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$username = $_POST['username'];
$numero_telephone = $_POST['phone'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$commune = $_POST['commune'];
$id = $_SESSION['login'];
$pwd=$_SESSION['pwd'];

//get id_commune of this utilisateur
$reqId = $DB -> prepare("SELECT id_commune FROM utilisateur WHERE id = :userid");
$reqId ->bindValue(':userid',$id);
$reqId->execute();
$id_commune = $reqId->fetch()['id_commune'];

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

$ancien_path_photo = get_info()[0][4];
//print($ancien_path_photo);
if($_FILES['photo']['name'] != "")
{
    // Création d'un nom aléatoire pour la photo
    $nom_photo = md5(uniqid(rand(), true));
    $extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
    $path_photo = $nom_photo . "." . $extension_upload;
    $moving = move_uploaded_file($_FILES['photo']['tmp_name'],"../Images/Users/" . $path_photo);

    // Suppression de l'ancien fichier de photo s'il ne s'agit pas de la photo par défaut
    if ($ancien_path_photo != "no_avatar.jpeg")
    {
        print("\nok1");
        $path_to_delete = "../Images/Users/" . $ancien_path_photo;
        print($path_to_delete);
        print(is_writable($path_to_delete));
        if (is_writable($path_to_delete))
        {
            unlink($path_to_delete);
            print("\nok2");
        }
    }
}
else
    $path_photo = $ancien_path_photo;


// Redirection vers la page d'accueil si tous les tests sont passés, ou vers la page d'inscription sinon
if (verifFullfill() == 0  && verifEmail() == 0 && verifUsername() == 0) {
    global $DB;
    // Enregistrement du nouvel utilisateur dans la BD
    $mdp=$_POST['nmdp'];
    $safemdp = password_hash($mdp, PASSWORD_DEFAULT);

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

    // Requête de modification des informations de l'utilisateur
    $result = modif_utilisateur($username, $safemdp, $prenom, $nom, $email, $id_commune, $adresse, $path_photo, $id);
    //Si des villes ont été trouvées, on stocke l'ID qui lui correspond dans $id_commune
    if ($result)
        header('Location:../monCompte.php');
    else{
        header('Location:../monCompte.php');
    }
}
else
    echo "Il y a eu un problème lors de votre modification , veuillez cliquer sur le lien ci\n";


function verifFullfill()
{
    global $DB;
    $username = $DB->quote($_POST['username']);
    $nom = $DB->quote($_POST['nom']);
    $prenom = $DB->quote($_POST['prenom']);
    $email = $DB->quote($_POST['email']);
    $phone = $DB->quote($_POST['phone']);
    $adresse = $DB->quote($_POST['adresse']);
    $commune = $DB->quote($_POST['commune']);
    if( $username == "" || $nom == "" || $prenom == "" ||  $email == "" || $phone == "" || $adresse == "" || $commune == "")
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