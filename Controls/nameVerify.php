<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 06/11/2016
 * Time: 22:16
 */

$Name = $_GET['name'];

include( dirname(__FILE__) . '/../Models/Connexion.php');

$sql = $DB->prepare("SELECT * FROM Utilisateur WHERE username = :name");
$sql->execute(array('name' => $Name));
$result = $sql->fetchAll();

if($result[0] == "")
{
    echo '1';
}
else
{
    echo '0';
}
exit();
?>