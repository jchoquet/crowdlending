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
    global $DB, $password, $username, $nom, $prenom, $password2, $phone, $address, $email;

    //A CHANGER AU PLUS VITE
    $hashpassword = $password;

    $sql = $DB->prepare("INSERT INTO utilisateur (username, prenom, nom, email, hash_password) VALUES (:username, :prenom, :nom, :email, :hashpassword)");
    $sql->bindParam(':username', $username);
    $sql->bindParam(':prenom', $prenom);
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':hashpassword', $hashpassword);
    $sql->execute();
    header( dirname(__FILE__) . '/../index.php');
}
else header(dirname(__FILE__) . '/../Views/inscription.php');

?>
