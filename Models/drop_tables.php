<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 12/11/2016
 * Time: 19:20
 */

// Pour détruire toutes les tables de la base de données

include "connexion.php";

$qr = $DB->query("DROP TABLE besoin;");
$qr = $DB->query("DROP TABLE categorisation;");
$qr = $DB->query("DROP TABLE categorie;");
$qr = $DB->query("DROP TABLE membre;");
$qr = $DB->query("DROP TABLE groupe;");
$qr = $DB->query("DROP TABLE pret;");
$qr = $DB->query("DROP TABLE objet;");
$qr = $DB->query("DROP TABLE utilisateur;");
$qr = $DB->query("DROP TABLE commune;");
$qr = $DB->query("DROP TABLE departement;");

?>