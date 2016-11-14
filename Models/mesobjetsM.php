<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 13/11/2016
 * Time: 19:23
 */


include "connexion.php";
// L'id de l'utilisateur connecté est connu grâce à session_start() lancé au moment de la connexion

// Renvoie le "path_photo", le "nom" et l'"id" des objets disponibles de l'utilisateur
function get_available_objets()
{
    global $DB;
    $id = $_SESSION['idUser'];
    $informations_objets = array();
    // La boucle qui suit récupère les informations des objets disponibles de l'utilisateur
    foreach ($DB->query("SELECT path_photo, nom, id FROM objet WHERE id_owner=\"$id\" AND isAvailable=1;") as $row)
    {
        array_push($informations_objets, array($row['path_photo'], $row['nom'], $row['id']));
    }
    return $informations_objets;
}


// Renvoie le nom de l'objet qui va être supprimé, d'id "id_to_delete"
function objet_to_delete($id_to_delete)
{
    global $DB;
    return $DB->query("SELECT nom from objet WHERE id=\"$id_to_delete\"")->fetch()[0];
}

// Supprime l'objet d'id "id_to_delete"
function delete_objet($id_to_delete)
{
    global $DB;
    $qr = $DB->exec("DELETE FROM objet WHERE id=\"$id_to_delete\"");
    return $qr;
}

?>