<?php
/**
 * Created by PhpStorm.
 * User: qianqiuhao
 * Date: 16/12/10
 * Time: 下午1:08
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
function getnom($idBesoin)
{
    global $DB;
    $req = $DB->prepare("SELECT nom FROM besoin WHERE id = :idBesoin");
    $req->bindValue(':idBesoin', $idBesoin);
    $req->execute();
    $row = $req->fetch();
    return $row['nom'];
}

function getphoto($idBesoin)
{
    global $DB;
    $req = $DB->prepare("SELECT path_photo FROM besoin WHERE id = :idBesoin");
    $req->bindValue(':idBesoin', $idBesoin);
    $req->execute();
    $row = $req->fetch();
    return $row['path_photo'];
}

function getdescription($idBesoin)
{
    global $DB;
    $req = $DB->prepare("SELECT description FROM besoin WHERE id = :idBesoin");
    $req->bindValue(':idBesoin', $idBesoin);
    $req->execute();
    $row = $req->fetch();
    return $row['description'];
}



?>