<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 30/11/2016
 * Time: 18:18
 */

// Prend en argument la valeur de l'attribut isAccepted d'un prêt et renvoie l'état correspondant
function affichage_etat($etat)
{
    switch ($etat)
    {
        case -1:
            return "Demande refusée";
            break;
        case 0:
            return "En attente";
            break;
        case 1:
            return "Demande acceptée";
            break;
    }
}