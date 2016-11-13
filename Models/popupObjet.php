<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 13/11/2016
 * Time: 19:08
 */

include __DIR__."/connexion.php";

//Récupération de l'id de l'objet ouvert
$idObjet = $_POST['idObjet'];

//Exécution de la fonction adéquate
if(isset($_POST['fun'])){
    if($_POST['fun'] == 'nom'){
        nomObj($idObjet);
    }
    if($_POST['fun'] == 'urlPhoto'){
        urlPhotoObj($idObjet);
    }
    if($_POST['fun'] == 'description'){
        descriptionObj($idObjet);
    }
}

//Affiche le nom de l'objet étudié
function nomObj($idObjet){
    global $DB;
    //Préparation de la requête
    $requete = $DB->prepare("SELECT nom FROM objet WHERE id = :idObjet");
    $requete->bindValue(':idObjet', $idObjet);

    //Exécution et récupération du résultat
    $requete->execute();
    $row = $requete->fetch(); //Récupération du premier résultat
    echo $row['nom'];
}

//Affiche l'url de la photo de l'objet étudié
function urlPhotoObj($idObjet){
    global $DB;
    //Préparation de la requête
    $requete = $DB->prepare("SELECT path_photo FROM objet WHERE id = :idObjet");
    $requete->bindValue(':idObjet', $idObjet);

    //Exécution et récupération du résultat
    $requete->execute();
    $row = $requete->fetch(); //Récupération du premier résultat
    echo $row['path_photo'];
}

//Affiche la description de l'objet étudié

function descriptionObj($idObjet)
{
    global $DB;
    //Préparation de la requête
    $requete = $DB->prepare("SELECT description FROM objet WHERE id = :idObjet");
    $requete->bindValue(':idObjet', $idObjet);

    //Exécution et récupération du résultat
    $requete->execute();
    $row = $requete->fetch(); //Récupération du premier résultat
    echo $row['description'];
}

?>