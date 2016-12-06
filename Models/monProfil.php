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

?>