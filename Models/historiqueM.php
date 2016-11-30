<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 30/11/2016
 * Time: 17:39
 */

include __DIR__."/connexion.php";
// L'id de l'utilisateur connecté est connu grâce à session_start() lancé au moment de la connexion

// Renvoie le "path_photo", le "nom" et l'"id" des objets disponibles de l'utilisateur
function get_historique_prets()
{
    global $DB;
    $id = $_SESSION['login'];
    $informations_prets = array();
    $query = "SELECT pret.id AS id_pret, objet.path_photo, objet.nom AS nom_objet, id_objet, username FROM pret
  JOIN objet ON pret.id_objet=objet.id
  JOIN utilisateur ON pret.id_borrower=utilisateur.id
  WHERE objet.id_owner=\"$id\" AND isAccepted=1
  ORDER BY id_pret ASC;";
    // La boucle qui suit récupère les informations des objets disponibles de l'utilisateur
    foreach ($DB->query($query) as $row)
    {
        array_push($informations_prets, array($row['id_pret'], $row['path_photo'], $row['nom_objet'], $row['id_objet'], $row['username']));
    }
    return $informations_prets;
}

?>