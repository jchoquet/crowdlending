<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 17/11/2016
 * Time: 16:52
 */


//include the inscription view

include __DIR__ . '/../Views/inscriptionView.php';

//Récupération du type d'erreur s'il y en a une

$erreur = isset($_GET['err']) ? $_GET['err'] : null;

//Si la commune n'a pas été retrouvée dans la BD
if ($erreur && $erreur == "commune") {
    echo "<script> communeNotFound(); </script>";
}

//Autre erreur inconnue
if ($erreur && $erreur == "inconnue") {
    echo "<script> erreurInconnue(); </script>";
}

?>