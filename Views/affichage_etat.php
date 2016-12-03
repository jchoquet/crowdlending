<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 30/11/2016
 * Time: 18:18
 */

// Prend en argument la valeur de l'attribut isAccepted d'un prêt et renvoie l'état correspondant
function affichage_etat($etat, $isReturned)
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
            if ($isReturned == -1)
            {
                return "Demande acceptée";
            }
            if ($isReturned == 0)
            {
                return "Rendre en cours";
            }
            if ($isReturned == 1)
            {
                return "Déja rendu";
            }
    }
}