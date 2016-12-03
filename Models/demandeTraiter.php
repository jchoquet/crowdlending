<?php
/**
 * Created by PhpStorm.
 * User: qianqiuhao
 * Date: 16/11/27
 * Time: 上午12:32
 */
include __DIR__."/connexion.php";

function demande_traiter($objetId)
{
    global $DB;
    //check the emprunteur was logged in.
    if (isset($_SESSION["login"]) && $objetId!="" ) {
        $emprunteurId = $_SESSION["login"];
        // check if the object demanded is available
        $result = $DB->query("SELECT isAvailable FROM objet WHERE id = \"$objetId\";")->fetch();
        if ($result['isAvailable'] != 1){      //if it is not available
            return FALSE;
        }
        //if it is available
        else {
            // set unavailable
            $statement_update = $DB -> prepare("UPDATE objet SET isAvailable=0 WHERE id =:objetId");
            $statement_update -> bindValue(':objetId',$objetId);
            $statement_update -> execute();

            // add this record to table "pret"
            $statement_insert = $DB -> prepare("INSERT INTO pret(id_borrower, id_objet) VALUES(:emprunteurId, :objetId)");
            $statement_insert -> bindValue(':emprunteurId', $emprunteurId);
            $statement_insert -> bindValue(':objetId', $objetId);
            $statement_insert -> execute();
            return TRUE;
        }
    }
    else {
        return FALSE;
    }
}

// When emprunteur click on "rendre"
function emprunteur_return($pretId)
{
    global $DB;
    //check the emprunteur was logged in.
    if (isset($_SESSION["login"]) && $pretId!="" ) {
        // set isReturned in BD.
        $statement_update = $DB -> prepare("UPDATE pret SET isReturned=0 WHERE id =:pretId");
        $statement_update -> bindValue(':pretId',$pretId);
        $statement_update -> execute();
        return  TRUE;
    }
    else {
        return FALSE;
    }
}

// When prêteur click on "confirmer recevoir l'objet"
function preteur_confirmer($pretId)
{
    global $DB;
    //check the preteur was logged in.
    if (isset($_SESSION["login"]) && $pretId!="" ) {
        // set isReturned in BD.
        $statement_update = $DB -> prepare("UPDATE pret SET isReturned=1 WHERE id =:pretId");
        $statement_update -> bindValue(':pretId',$pretId);
        $statement_update -> execute();

        $date_retour = date("Y-m-d");
        $enregistrement_date_retour = $DB -> prepare("UPDATE pret SET date_returned=:date_retour WHERE id=:pretId;");
        $enregistrement_date_retour -> bindValue(':date_retour', $date_retour);
        $enregistrement_date_retour -> bindValue(':pretId', $pretId);
        $enregistrement_date_retour -> execute();

        //get object's id.
        $result = $DB->query("SELECT id_objet FROM pret WHERE id = \"$pretId\";")->fetch();
        $objetId = $result['id_objet'];

        // set object available
        $statement_update = $DB -> prepare("UPDATE objet SET isAvailable=1 WHERE id =:objetId");
        $statement_update -> bindValue(':objetId',$objetId);
        $statement_update -> execute();
        return TRUE;
    }
    else {
        return FALSE;
    }
}

?>