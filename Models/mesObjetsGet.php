<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/12/2016
 * Time: 23:34
 */

include __DIR__ . '/../Models/connexion.php';


$a = session_id();
if(empty($a)) session_start();

/*if(isset($_POST['iid'])) {
    $iid = $_POST['iid'];
    $nom = getnom($iid);
    $photo = getphoto($iid);
    $description = $getdescription($iid);
    $reponse = array("nom" => $nom, "photo" => $photo, "description" => $description);
    echo $reponse;
}
*/
function getnom($idObjet)
{
    global $DB;
    $req = $DB->prepare("SELECT nom FROM objet WHERE id = :idObjet");
    $req->bindValue(':idObjet', $idObjet);
    $req->execute();
    $row = $req->fetch();
    return $row['nom'];
}

function getphoto($idObjet)
{
    global $DB;
    $req = $DB->prepare("SELECT path_photo FROM objet WHERE id = :idObjet");
    $req->bindValue(':idObjet', $idObjet);
    $req->execute();
    $row = $req->fetch();
    return $row['path_photo'];
}

function getdescription($idObjet)
{
    global $DB;
    $req = $DB->prepare("SELECT description FROM objet WHERE id = :idObjet");
    $req->bindValue(':idObjet', $idObjet);
    $req->execute();
    $row = $req->fetch();
    return $row['description'];
}



?>