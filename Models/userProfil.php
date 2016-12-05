<?php


include "Models/connexion.php";

function check_username($username) {
  global $DB;
  $stmt = $DB->prepare("SELECT COUNT(*) FROM utilisateur WHERE username=:username");
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  return $stmt->fetchColumn();
}

function get_infos_by_username($username)
{
    global $DB;
    $informations = array();
    foreach ($DB->query("SELECT id, nom, prenom, email, path_photo, adresse, numero_telephone, id_commune FROM utilisateur WHERE username=\"$username\";") as $row)
    {
        array_push($informations, array($row['id'],$row['nom'],$row['prenom'], $row['email'],$row['path_photo'], $row['adresse'], $row['numero_telephone'], $row['id_commune']));
    }
    return $informations;
}

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