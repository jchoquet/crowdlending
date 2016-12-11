<?php
/**
 * Created by PhpStorm.
 * User: qianqiuhao
 * Date: 16/12/10
 * Time: 下午12:57
 */


include __DIR__."/connexion.php";
// L'id de l'utilisateur connectÃ© est connu grÃ Â¢ce Ã Â  session_start() lancÃ© au moment de la connexion


// Renvoie le nom de l'objet qui va Ãªtre modifiÃ©, d'id "id_to_modifier"
function besoin_to_modifier($id_to_modifier)
{
    global $DB;
    return $DB->query("SELECT nom from besoin WHERE id=\"$id_to_modifier\"")->fetch()[0];
}

//modifier l'objet d'id "id_to_delete"

function modifier_besoin($id_to_modifier, $titre, $path_photo, $description)
{
    global $DB;
    $qr = $DB->prepare("UPDATE besoin SET nom =\"$titre\", path_photo = \"$path_photo\", description = \"$description\" WHERE id=\"$id_to_modifier\"");
    $result = $qr->execute();
    return $result;
}



?>