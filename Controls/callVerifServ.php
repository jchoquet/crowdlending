<?php
/**
 * Created by PhpStorm.
 * User: Mehdi Khadir
 * Date: 06/11/2016
 * Time: 19:09
 */
include __DIR__ . '/verificationServeur.php';

// Redirection vers la page d'accueil si tous les tests sont passés, ou vers la page d'inscription sinon
if (verifFullfill() == 0 && verifPassword() && verifEmail() == 0 && verifUsername() == 0 )
{
    global $DB, $password, $username, $nom, $prenom, $password2, $phone, $address, $email;

    // A CHANGER AU PLUS VITE
    $hashpassword = $password;

    // Enregistrement du nouvel utilisateur dans la BD
    $sql = $DB->prepare("INSERT INTO utilisateur (username, prenom, nom, email, hash_password, id_commune) VALUES (:username, :prenom, :nom, :email, :hashpassword, :id_commune)");
    $sql->bindParam(':username', $username);
    $sql->bindParam(':prenom', $prenom);
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':hashpassword', $hashpassword);
    $id_commune = $DB->query("SELECT id FROM commune WHERE nom=\'" . $address . "\'")->fetch()['id'];
    $sql->bindParam(':id_commune', $id_commune);
    $sql->execute();
    header(__DIR__ . '/../index.php');
}
else header(__DIR__ . '/../Views/inscription.php');

?>
