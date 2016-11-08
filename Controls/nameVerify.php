<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 06/11/2016
 * Time: 22:16
 */

$username = $_GET['username'];

include(dirname(__FILE__) . '/../Models/connexion.php');

$sql = $DB->prepare("SELECT * FROM utilisateur WHERE username = $username");
$sql->execute();

//Si le nom d'utilisateur n'a pas déjà été pris
if($sql->rowCount() == 0)
{
    echo '1';
}
else
{
    echo '0';
}
exit();
?>