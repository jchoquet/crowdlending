<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 24/11/2016
 * Time: 16:32
 */

include __DIR__."/connexion.php";
// L'id de l'utilisateur connecté est connu grâce à session_start() lancé au moment de la connexion


if (isset($_POST['action']) && !empty($_POST['action'])) 
{
    $action = $_POST['action'];
    switch($action) {
        case 'accepter': modif_accepter(); break;
        case 'refuser': modif_refuser(); break;
    }
}


// Renvoie le "path_photo", le "nom" et l'"id" des objets disponibles de l'utilisateur
function get_waiting_pret()
{
    global $DB;
    $id = $_SESSION['login'];
    $informations_objets = array();
    $query = "SELECT pret.id AS id_pret, objet.path_photo, objet.nom AS nom_objet, id_objet, username FROM pret
  JOIN objet ON pret.id_objet=objet.id
  JOIN utilisateur ON pret.id_borrower=utilisateur.id
  WHERE objet.id_owner=\"$id\" AND accepted IS NULL
  ORDER BY id_pret ASC;";
    // La boucle qui suit récupère les informations des objets disponibles de l'utilisateur
    foreach ($DB->query($query) as $row)
    {
        array_push($informations_objets, array($row['id_pret'], $row['path_photo'], $row['nom_objet'], $row['id_objet'], $row['username']));
    }
    return $informations_objets;
}


function modif_accepter($id_pret)
{
    echo 'aaa';
}

function modif_refuser($id_pret)
{
    echo 'bbb';
}

/*// Renvoie le nom de l'objet qui va être supprimé, d'id "id_to_delete"
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
}*/

?>