<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 06/11/2016
 * Time: 22:16
 */

$username = $_POST['username'];

include(dirname(__FILE__) . '/../Models/Connexion.php');

//Requête sélectionnant tous les noms d'utilisateurs correspondant à celui entré par l'utilisateur dans le formulaire
$sql = $DB->prepare("SELECT * FROM utilisateur WHERE username = :username");
$sql->bindValue(':username',$username);
$sql->execute();

//Si le nom d'utilisateur n'a pas déjà été pris
if($sql->rowCount() == 0)
{
    echo '1';
}
else if ($sql->rowCount() > 0)
{
    echo '0';
}
else {
    echo 'error';
}
exit();
?>