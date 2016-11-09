<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 06/11/2016
 * Time: 22:16
 */

$username = $_POST['username'];

include(dirname(__FILE__) . '/../Models/Connexion.php');


$sql = $DB->prepare("SELECT * FROM Utilisateur WHERE username = '$username'");
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