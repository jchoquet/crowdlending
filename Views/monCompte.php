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
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <form role="form" id="modifProf" method="POST" action="../Controls/verificationProfil.php">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="nom" id="nom" class="form-control input-lg" Value="<?php echo $nom; ?>" placeholder="Nom" tabindex="1" required/>
                            <span class="errors" id="nomerror"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="prenom" id="prenom" class="form-control input-lg" Value="<?php echo $prenom; ?>" placeholder="Prenom" tabindex="2" required/>
                            <span class="errors" id="prenomerror"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control input-lg" Value="<?php echo $username; ?>" placeholder="username" tabindex="3" required/>
                    <span class="errors" id="usernameerror"></span>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" Value="<?php echo $email; ?>" placeholder="Email" tabindex="4">
                    <span class="errors" id="emailerror"></span>
                </div>
                <div class="form-group">
                    <input type="text" name="adresse" id="adresse" class="form-control input-lg" Value="<?php echo $adresse; ?>" placeholder="Adresse" tabindex="5">
                    <span class="errors" id="adresseerror"></span>
                </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="phone" id="phone" class="form-control input-lg" Value="<?php echo $numero_telephone; ?>" placeholder="Numéro de téléphone" tabindex="6">
                    <span class="errors" id="phoneerror"></span>
                </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="commune" id="commune" class="form-control input-lg" Value="<?php echo $code_postale; ?>" placeholder="Commune" tabindex="8">
                    <span class="errors" id="communeerror"></span>
                    <datalist id="commune">
                        <?php include __DIR__ . "/../Models/autocomplete_commune.php"; ?>
                    </datalist>
                </div>
                </div>
            </div>

                    <div class="form-group">
                        <label  for="omdp" >Ancien mot de passe : </label>
                        <input class="form-control" type="password" name="Mot de passe" id="omdp" />
                        <div class="col-sm-4 errors" id="oldMdperror"></div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label  for="nmdp" >Nouveau mot de passe : </label>
                                <input class="form-control" id="nmdp" type="password" name="New mot de passe" />
                                <div class="col-sm-4 errors" id="newMdperror"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label  for="mdpc" >Confirmez nouveau mot de passe : </label>
                                <input class="form-control" id="mdpc" type="password" name="Conf new mot de passe"  />
                                <div class="col-sm-4 errors" id="cnewMdperror"></div>
                            </div>
                        </div>
                    </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <img src="../Images/Objets/<?php echo $path_photo ?>"  width="150" height="150">
                        <div class="input-group">
                            <label class="input-group-btn" for="photo">
                                <span class="btn btn-info"><span class="glyphicon glyphicon-picture"></span>
                                    Sélectionner une photo <input type="file" id="photo" name="photo" style="display: none;"/>
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly="" value="Aucun fichier choisi" />
                        </div>
                    </div>
                </div>


                <div class="profile-userbuttons">
                    <button type="submit" class="btn btn-md btn-default btn-success" id="modifProf" name="modifProf">Modifier le profil</button>
                    <span class="errors" id="formerror"></span>
                    <button type="button" class="btn btn-md btn-default btn-danger" data-dismiss="modal" id="dismiss-button2">Annuler</button>
                </div>
                <span class="errors" id="formerror"></span>
            </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>



</body>
</html>
