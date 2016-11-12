<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 06/11/2016
 * Time: 11:18
 */
// On inclut "Config.php" de cette façon pour éviter des erreurs de double inclusion
include __DIR__ . "/../Config.php";
// On essaie de se connecter avec PDO à la base de données
// en utilisant les paramètres du fichier "Config.php"
try
{
    $DB = new PDO($DB_TYPE . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET,
        $DB_USER, $DB_PASSWORD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e) // on renvoie l'erreur s'il y en a une
{
    die("Erreur : " . $e->getMessage());
}
?>