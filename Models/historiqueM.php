<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 30/11/2016
 * Time: 17:39
 */

include __DIR__."/connexion.php";
// L'id de l'utilisateur connecté est connu grâce à session_start() lancé au moment de la connexion

// Renvoie les demandes de prêts qu'a accepté l'utilisateur
// (On n'affiche pas les demandes que l'utilisateur a refusé)
function get_historique_prets()
{
    global $DB;
    $id = $_SESSION['login'];
    $informations_prets = array();
    $query = "SELECT pret.id AS id_pret, objet.path_photo, objet.nom AS nom_objet, id_objet, username, isAccepted AS etat, isReturned FROM pret
  JOIN objet ON pret.id_objet=objet.id
  JOIN utilisateur ON pret.id_borrower=utilisateur.id
  WHERE objet.id_owner=\"$id\" AND (isAccepted=1 OR isAccepted=0)
  ORDER BY id_pret DESC;";
    // La boucle qui suit récupère les informations des demandes de prêts reçues par l'utilisateur
    foreach ($DB->query($query) as $row)
    {
        array_push($informations_prets, array($row['id_pret'], $row['path_photo'], $row['nom_objet'], $row['id_objet'], $row['username'], $row['etat'],$row['isReturned']));
    }
    return $informations_prets;
}


// Renvoie les demandes d'emprunts effectuées par l'utilisateur
// (On affiche les demandes refusées par d'autres utilisateurs)
function get_historique_emprunts()
{
    global $DB;
    $id = $_SESSION['login'];
    $informations_emprunts = array();
    $query = "SELECT pret.id AS id_pret, objet.path_photo, objet.nom AS nom_objet, id_objet, username, isAccepted AS etat, isReturned FROM pret
  JOIN objet ON pret.id_objet=objet.id
  JOIN utilisateur ON objet.id_owner=utilisateur.id
  WHERE id_borrower=\"$id\"
  ORDER BY id_pret DESC;";
    // La boucle qui suit récupère les informations des demandes de prêts de l'utilisateur
    foreach ($DB->query($query) as $row)
    {
        array_push($informations_emprunts, array($row['id_pret'], $row['path_photo'], $row['nom_objet'], $row['id_objet'], $row['username'], $row['etat'],$row['isReturned']));
    }
    return $informations_emprunts;
}

?>