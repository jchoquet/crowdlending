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
function get_available_objets($word,$categorie) //En fonction de l'id de l'objet recherché pour commencer
{
    global $DB;
    $id = $_SESSION['login'];
    $informations_objets = array();
    // La boucle qui suit récupère les informations des objets disponibles de l'utilisateur
    if($categorie == ""){ //Si aucune categorie n'a été sélectionnée
        foreach ($DB->query("SELECT path_photo, nom, id, id_owner FROM objet WHERE isAvailable=1 AND nom LIKE \"%$word%\";") as $row)
        {
            array_push($informations_objets, array($row['path_photo'], $row['nom'], $row['id'], $row['id_owner']));
        }
    }

    else{
        foreach ($DB->query("SELECT objet.path_photo, objet.nom, objet.id, id_owner FROM categorisation JOIN objet ON objet.id=id_objet JOIN categorie ON categorie.id=id_categorie WHERE isAvailable=1 AND objet.nom LIKE \"%$word%\" AND categorie.nom=\"$categorie\";") as $row)
        {
            array_push($informations_objets, array($row['path_photo'], $row['nom'], $row['id'], $row['id_owner']));
        }
    }
    return $informations_objets;
}

function get_email($owner_id)
{
    global $DB;
    return $DB->query("SELECT username, email FROM utilisateur WHERE id=\"$owner_id\";")->fetch();
}

?>