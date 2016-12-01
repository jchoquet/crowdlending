<?php

include "../Models/monProfil.php";

?>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lend it - Mon profil </title>
    <meta name="description" content="Page de Profil">
    <meta name="author" content="Mahrous Anouar">

    <!-- Source CSS Bootstrap -->
    <link rel="stylesheet" href="../Styles/bootstrap.css">

    <!-- Source css pour le design du site -->
    <link rel="stylesheet" href="../Styles/base.css">

    <!-- Source pour le formulaire dajout -->
    <link rel="stylesheet" href="../Styles/monprofil.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Source jquery -->
    <script src="../Scripts/jquery_library.js"></script>
    <!-- Source JavaScript Bootstrap -->
    <script src="../Scripts/bootstrap.js"></script>
    <script src="../Scripts/profil.js"></script>

</head>

<body>

<?php include("../Views/header.php"); ?>

<?php
$informations = get_info();
$path_photo =$informations[0][4];
$username = $informations[0][0];
$nom = $informations[0][1];
$prenom = $informations[0][2];
$email = $informations[0][3];
$adresse= $informations[0][5];
$numero_telephone= $informations[0][6];
$id_commune= $informations[0][7];
$code_postale = get_commune($id_commune);
?>


<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="../Images/Objets/<?php echo $path_photo ?>" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $username; ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo $nom; ?><?php echo " " ?><?php echo $prenom; ?>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Modifier</button>
                    <button type="button" class="btn btn-danger btn-sm">Supprimer</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="../Views/profil.php">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                        </li>
                        <li>
                            <a href="../Views/monCompte.php">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        </div>
    </div>
<br>
<br>

</body>
</html>
