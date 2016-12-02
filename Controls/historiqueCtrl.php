<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 02/12/2016
 * Time: 14:57
 */

$page_prets = isset($_REQUEST['page_prets']) ? $_REQUEST['page_prets'] : 1; // pour savoir la page actuelle de l'onglet "Mes prêts"
$page_emprunts = isset($_REQUEST['page_emprunts']) ? $_REQUEST['page_emprunts'] : 1; // pour savoir la page actuelle de l'onglet "Mes emprunts"
$DIV = 5; // nombre d'objets affichés

?>