<?php
/**
 * Created by PhpStorm.
 * User: qianqiuhao
 * Date: 16/12/10
 * Time: 下午12:40
 */
include __DIR__."/connexion.php";

function get_besoins()
{
    global $DB;
    $id = $_SESSION['login'];
    $informations_besoins = array();
    // La boucle qui suit rÃ©cupÃ¨re les informations des besoins de l'utilisateur
    foreach ($DB->query("SELECT path_photo, nom, id, description,isAnswered FROM besoin WHERE id_asker=\"$id\";") as $row)
    {
        array_push($informations_besoins, array($row['path_photo'], $row['nom'], $row['id'], $row['description'], $row['isAnswered']));
    }
    return $informations_besoins;
}

// Renvoie le nom de le besoin qui va Ãªtre supprimÃ©, d'id "id_to_delete"
function objet_to_delete($id_to_delete)
{
    global $DB;
    return $DB->query("SELECT nom from besoin WHERE id=\"$id_to_delete\"")->fetch()[0];
}

// Supprime le besoin d'id "id_to_delete"
function delete_objet($id_to_delete)
{
    global $DB;
    $qr = $DB->exec("DELETE FROM besoin WHERE id=\"$id_to_delete\"");
    return $qr;
}
?>