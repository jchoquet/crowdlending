<?php
/**
 * Created by PhpStorm.
 * User: Mehdi Khadir
 * Date: 06/11/2016
 * Time: 19:09
 */

include "verificationServeur.php";

//Redirection vers la page d'accueil si tous les tests sont passés, ou vers la page d'inscription sinon
if (verifFullfill() && verifPassword() && verifEmail() && verifUsername())
    header("../index.php");
else header("../Views/inscription.php");

?>
