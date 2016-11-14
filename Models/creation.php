<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 06/11/2016
 * Time: 11:18
 */
// Fichier pour créer les tables de la base de données
// et remplir les tables "departement" et "commune"
// On se connecte à la base de données
include "connexion.php";
// Ajout des tables "departement " et "commune"
// Insertion de valeurs
$sql = file_get_contents('departement_commune.sql');
$qr = $DB->exec($sql);
// Ajout de la table "utilisateur"
$sql = file_get_contents('utilisateur.sql');
$qr = $DB->exec($sql);
// Ajout de la table "groupe"
$sql = file_get_contents('groupe.sql');
$qr = $DB->exec($sql);
// Ajout de la table "membre"
$sql = file_get_contents('membre.sql');
$qr = $DB->exec($sql);
// Ajout de la table "besoin"
$sql = file_get_contents('besoin.sql');
$qr = $DB->exec($sql);
// Ajout de la table "objet"
$sql = file_get_contents('objet.sql');
$qr = $DB->exec($sql);
// Ajout de la table "pret"
$sql = file_get_contents('pret.sql');
$qr = $DB->exec($sql);
// Ajout de la table "categorie"
$sql = file_get_contents('categorie.sql');
$qr = $DB->exec($sql);
// Ajout de la table "categorisation"
$sql = file_get_contents('categorisation.sql');
$qr = $DB->exec($sql);
?>