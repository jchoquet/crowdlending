<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 13/11/2016
 * Time: 19:23
 */


include __DIR__."/connexion.php";
// L'id de l'utilisateur connecté est connu grâce à session_start() lancé au moment de la connexion

// Renvoie le "path_photo", le "nom" et l'"id" des objets disponibles en général, sauf de ceux de l'utilisateur
function get_available_objets($idObj) //En fonction de l'id de l'objet recherché pour commencer
{
    global $DB;
    $id = $_SESSION['login'];
    $informations_objets = array();
    // La boucle qui suit récupère les informations des objets disponibles de l'utilisateur
    foreach ($DB->query("SELECT path_photo, nom, id, id_owner FROM objet WHERE isAvailable=1 AND id=\"$idObj\";") as $row)
    {
        array_push($informations_objets, array($row['path_photo'], $row['nom'], $row['id'], $row['id_owner']));
    }
    return $informations_objets;
}

?>