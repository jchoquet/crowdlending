<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 08/12/2016
 * Time: 14:53
 */

session_start();
$id_user = $_SESSION['login'];
include "../Models/monProfil.php";


$photo_utilisateur = photo_user($id_user);
if ($photo_utilisateur != "no_avatar.jpeg")
{
    $path_photo_user = "../Images/Users/" . $photo_utilisateur;
    if (is_writable($path_photo_user))
        unlink($path_photo_user);
}

$photos_objets = all_photos_objects($id_user);
if (sizeof($photos_objets) != 0)
{
    foreach ($photos_objets as $photo_objet)
    {
        if ($photo_objet != "no_image.png")
        {
            $path_photo_objet = "../Images/Objets/" . $photo_objet;
            if (is_writable($path_photo_objet))
                unlink($path_photo_objet);
        }
    }
}

if (suppression_compte($id_user))
    header("Location: ../Controls/deconnexion.php");

else
    header("Location: ../monCompte.php");

?>