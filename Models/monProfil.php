<?php

include __DIR__. "/../Models/connexion.php";

function get_info()
{
    global $DB;
    $ident = $_SESSION['login'];
    $informations = array();
    foreach ($DB->query("SELECT username, nom, prenom, email, path_photo, adresse, numero_telephone, id_commune, id FROM utilisateur WHERE id=\"$ident\";") as $row)
    {
        array_push($informations, array($row['username'],$row['nom'],$row['prenom'], $row['email'],$row['path_photo'], $row['adresse'], $row['numero_telephone'], $row['id_commune'], $row['id']));
    }
    return $informations;
}


// Modifie les informations d'un utilisateur
// Prend en argument les valeurs des attributs à modifie et l'id de l'utilisateur 
function modif_utilisateur($username, $safemdp, $prenom, $nom, $email, $id_commune, $adresse, $path_photo, $id)
{
    global $DB;
    return $DB->exec("UPDATE utilisateur SET username=\"$username\" , hash_password =\"$safemdp\", prenom =\"$prenom\", nom =\"$nom\", email =\"$email\", id_commune = \"$id_commune\" , adresse=\"$adresse\" , path_photo=\"$path_photo\" WHERE id=\"$id\";");
}

// on récupère le nom correspondant à une id_commune
function get_commune($idCommune)
{
    global $DB;
    $req = $DB->prepare("SELECT nom FROM commune WHERE id=\"$idCommune\";");
    $req->bindValue(':idCommune', $idCommune);
    $req->execute();
    $row = $req->fetch();
    return $row['nom'];

}


// Renvoie le nombre de prêts et d'emprunts en cours d'un utilisateur
// Sert à savoir si un utilisateur peut supprimer son compte
function nb_prets_emprunts_actifs($id_user)
{
    global $DB;
    $nb_prets_actifs = $DB -> query("SELECT COUNT(pret.id) FROM pret JOIN objet ON pret.id_objet = objet.id JOIN utilisateur ON objet.id_owner = utilisateur.id WHERE utilisateur.id=\"$id_user\" AND isAccepted=1 AND isReturned!=1;") -> fetch()[0];
    $nb_emprunts_actifs = $DB -> query("SELECT COUNT(id) FROM pret WHERE id_borrower=\"$id_user\" AND isAccepted=1 AND isReturned!=1;") -> fetch()[0];
    return $nb_prets_actifs + $nb_emprunts_actifs;
}


// Renvoie le path_photo de l'image de profil d'un utilisateur
function photo_user($id_user)
{
    global $DB;
    return $DB -> query("SELECT path_photo FROM utilisateur WHERE id=\"$id_user\";") -> fetch()[0];
}

// Renvoie les paths des photos de tous les objets appartenant à un utilisateur
function all_photos_objects($id_user)
{
    global $DB;
    $paths_photos = array();
    foreach ($DB -> query("SELECT path_photo FROM objet WHERE id_owner=\"$id_user\";") as $row)
    {
        array_push($paths_photos, $row['path_photo']);
    }
    return $paths_photos;
}


// Supprime l'utilisateur de la base de données
// Tout ce qui est lié à cet utilisateur sera supprimé (objets, prêts)
function suppression_compte($id_user)
{
    global $DB;
    return $DB -> exec("DELETE FROM utilisateur WHERE id=\"$id_user\";");
}

?>