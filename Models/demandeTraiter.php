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
            // set unavailble
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
?>