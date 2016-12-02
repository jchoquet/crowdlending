<?php

include "Models/connexion.php";

function get_info()
{
    global $DB;
    $ident = $_SESSION['login'];
    $informations = array();
    foreach ($DB->query("SELECT username, nom, prenom, email,path_photo, adresse, numero_telephone,id_commune FROM utilisateur WHERE id=\"$ident\";") as $row)
    {
        array_push($informations, array($row['username'],$row['nom'],$row['prenom'], $row['email'],$row['path_photo'], $row['adresse'], $row['numero_telephone'], $row['id_commune']));
    }
    return $informations;
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