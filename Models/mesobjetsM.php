<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 13/11/2016
 * Time: 19:23
 */


include __DIR__."/connexion.php";
// L'id de l'utilisateur connectÃ© est connu grÃ Â¢ce Ã Â  session_start() lancÃ© au moment de la connexion


// Renvoie le nom de l'objet qui va Ãªtre modifiÃ©, d'id "id_to_modifier"
function objet_to_modifier($id_to_modifier)
{
    global $DB;
    return $DB->query("SELECT nom from objet WHERE id=\"$id_to_modifier\"")->fetch()[0];
}

//modifier l'objet d'id "id_to_delete"

function modifier_objet($id_to_modifier , $titre , $prix , $isAvailable , $path_photo , $description )
{
    global $DB;
    $id = $_SESSION['login'];
    $qr = $DB->prepare("UPDATE objet SET id=\"$id_to_modifier\" , nom =\"$titre\", prix =\"$prix\", path_photo = \"$path_photo\" ,  id_owner=\"$id\" , isAvailable =\"$isAvailable\" ,description = \"$description\" WHERE id=\"$id_to_modifier\"");
    $result = $qr->execute();
    return $result;
}



?>