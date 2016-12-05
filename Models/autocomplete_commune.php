<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 12/11/2016
 * Time: 17:26
 */

include __DIR__."/connexion.php";

// on récupère les noms de toutes les communes
$requete = $DB->query("SELECT nom, code_departement FROM commune");

// on parcourt la table et on met en option value les noms des communes
while ($row = $requete->fetch())
{
    echo "<option value='" . $row['nom'] . " - " . $row['code_departement'] . "'>";
}

?>