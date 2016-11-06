<?php
/**
 * Created by PhpStorm.
 * User: Mehdi Khadir
 * Date: 06/11/2016
 * Time: 19:09
 */
include( dirname(__FILE__) . '/verificationServeur.php');

//Redirection vers la page d'accueil si tous les tests sont passés, ou vers la page d'inscription sinon
if (verifFullfill()==0 && verifPassword() && verifEmail()==0 && verifUsername()==0 ){
    global $DB;
    $sql = "INSERT INTO utilisateur (username, prenom, nom, email) VALUES (:username, :prenom, :nom, :email)";
    $sql->bindParam(':username', $username);
    $sql->bindParam(':prenom', $prenom);
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':name', $name);
    $qr = $DB->exec($sql);
    header( dirname(__FILE__) . '/../index.php');
}
else header(dirname(__FILE__) . '/../Views/inscription.php');

?>
