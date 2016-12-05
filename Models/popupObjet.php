<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 13/11/2016
 * Time: 19:08
 */

include __DIR__."/connexion.php";

//RÃ©cupÃ©ration de l'id de l'objet ouvert
$idObjet = $_POST['idObjet'];

//ExÃ©cution de la fonction adÃ©quate
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

//Affiche le nom de l'objet Ã©tudiÃ©
function nomObj($idObjet){
    global $DB;
    //PrÃ©paration de la requÃªte
    $requete = $DB->prepare("SELECT nom FROM objet WHERE id = :idObjet");
    $requete->bindValue(':idObjet', $idObjet);

    //ExÃ©cution et rÃ©cupÃ©ration du rÃ©sultat
    $requete->execute();
    $row = $requete->fetch(); //RÃ©cupÃ©ration du premier rÃ©sultat
    echo $row['nom'];
}

//Affiche l'url de la photo de l'objet Ã©tudiÃ©
function urlPhotoObj($idObjet){
    global $DB;
    //PrÃ©paration de la requÃªte
    $requete = $DB->prepare("SELECT path_photo FROM objet WHERE id = :idObjet");
    $requete->bindValue(':idObjet', $idObjet);

    //ExÃ©cution et rÃ©cupÃ©ration du rÃ©sultat
    $requete->execute();
    $row = $requete->fetch(); //RÃ©cupÃ©ration du premier rÃ©sultat
    echo $row['path_photo'];
}

//Affiche la description de l'objet Ã©tudiÃ©

function descriptionObj($idObjet)
{
    global $DB;
    //PrÃ©paration de la requÃªte
    $requete = $DB->prepare("SELECT description FROM objet WHERE id = :idObjet");
    $requete->bindValue(':idObjet', $idObjet);

    //ExÃ©cution et rÃ©cupÃ©ration du rÃ©sultat
    $requete->execute();
    $row = $requete->fetch(); //RÃ©cupÃ©ration du premier rÃ©sultat
    echo $row['description'];
}

?>