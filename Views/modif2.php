<?php
include __DIR__ . '/../Models/connexion.php';


$a = session_id();
if(empty($a)) session_start();


function getnom($idObjet)
{
    global $DB;
    $req = $DB->prepare("SELECT nom FROM objet WHERE id = :idObjet");
    $req->bindValue(':idObjet', $idObjet);
    $req->execute();
    $row = $req->fetch();
    echo $row['nom'];
}

function getphoto($idObjet)
{
    global $DB;
    $req = $DB->prepare("SELECT path_photo FROM objet WHERE id = :idObjet");
    $req->bindValue(':idObjet', $idObjet);
    $req->execute();
    $row = $req->fetch();
    echo $row['path_photo'];
}

function getdescription($idObjet)
{
    global $DB;
    $req = $DB->prepare("SELECT description FROM objet WHERE id = :idObjet");
    $req->bindValue(':idObjet', $idObjet);
    $req->execute();
    $row = $req->fetch();
    echo $row['description'];
}



?>