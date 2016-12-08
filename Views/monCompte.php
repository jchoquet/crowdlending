<?php

include "Models/monProfil.php";

?>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lend it - Mon compte</title>
    <meta name="description" content="Page de Profil">
    <meta name="author" content="Mahrous Anouar">

    <!-- Source CSS Bootstrap -->
    <link rel="stylesheet" href="Styles/bootstrap.css">

    <!-- Source css pour le design du site -->
    <link rel="stylesheet" href="Styles/base.css">

    <!-- Source pour le formulaire dajout -->
    <link rel="stylesheet" href="Styles/monprofil.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Source jquery -->
    <script src="Scripts/jquery_library.js"></script>
    <!-- Source JavaScript Bootstrap -->
    <script src="Scripts/bootstrap.js"></script>
    <script src="Scripts/profil.js"></script>

</head>

<body>

<?php include("Views/header.php"); ?>

<?php
$informations = get_info();
$id = $_SESSION['login'];
$idprofil = $informations[0][8];
$path_photo =$informations[0][4];
$username = $informations[0][0];
$nom = $informations[0][1];
$prenom = $informations[0][2];
$email = $informations[0][3];
$adresse= $informations[0][5];
$numero_telephone= $informations[0][6];
$id_commune= $informations[0][7];
$code_postal = get_commune($id_commune);


$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'];
if (isset($_SESSION['message']) && !$pageWasRefreshed)
{
    ?>
    <div class="alert alert-danger alert-dismissable fade in" >
        <a href = "#" class="close" data-dismiss = "alert" aria-label = "close" >&times;</a >
        <?php echo $_SESSION['message']; ?>
    </div >
    <?php
    $_SESSION['message'] = NULL;
}

?>


<div class="container-fluid content">
    <div class="row">
        <div class="col-sm-3 col-md-2 profile-sidebar">

            <!-- SIDEBAR USERPIC -->
            <div class="thumbnail">
                <img src="Images/Users/<?php echo $path_photo ?>" class="img-responsive" alt="">
                <div class="caption profile-usertitle">
                    <p class="profile-usertitle-name">@<?php echo $username; ?></p>
                </div>
            </div>
            <!-- END SIDEBAR USERPIC -->

            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
                <a href="view_profil.php?username=<?php echo $username; ?>"><button type="button" class="btn btn-sm btn-info">Profil public</button></a>
            </div>
            <!-- END SIDEBAR BUTTONS -->

            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
                <ul class="nav page-step-menu">
                    <li class="active">
                        <a href="#" data-page-step="#page-step-1"><i class="glyphicon glyphicon-user"></i>Aperçu</a>
                    </li>
                    <li>
                        <a href="#" data-page-step="#page-step-2"><i class="glyphicon glyphicon-wrench"></i>Modifier</a>
                    </li>
                    <li>
                        <a href="#" data-page-step="#page-step-3"><i class="glyphicon glyphicon-trash"></i>Supprimer</a>
                    </li>
                </ul>
            </div>
            <!-- END MENU -->
        </div>

        <!-- Contenu pour afficher le profil -->
        <div class="col-sm-9 col-md-10 page-step" id="page-step-1">
            <div class="profile-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="thumbnail">
                            <img src="Images/Users/<?php echo $path_photo ?>" alt='avatar' >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-offset-1 col-md-6" id="infos">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>Nom</td>
                                <td><?php echo $nom; ?></td>
                            </tr>
                            <tr>
                                <td>Prénom</td>
                                <td><?php echo $prenom; ?></td>
                            </tr>
                            <tr>
                                <td>Nom d'utilisateur</td>
                                <td>@<?php echo $username; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <td>Adresse</td>
                                <td><?php echo $adresse; ?></td>
                            </tr>
                            <tr>
                                <td>Numéro</td>
                                <td><?php echo $numero_telephone; ?></td>
                            </tr>
                            <tr>
                                <td>Commune</td>
                                <td><?php echo $code_postal; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu pour modifier son profil -->
        <div class="col-sm-9 col-md-10 page-step" id="page-step-2">
            <div class="profile-content">
                <form role="form" id="modifProf" method="POST" action="Controls/verificationProfil.php" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                            <label  for="omdp">Nom :</label>
                            <input type="text" name="nom" id="nom" class="form-control" Value="<?php echo $nom; ?>" placeholder="Nom" tabindex="1" required/>
                            <span class="errors" id="nomerror"></span>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                            <label for="omdp" >Prenom :</label>
                            <input type="text" name="prenom" id="prenom" class="form-control" Value="<?php echo $prenom; ?>" placeholder="Prenom" tabindex="2" required/>
                            <span class="errors" id="prenomerror"></span>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                            <label  for="omdp" >Username :</label>
                            <input type="text" name="username" id="username" class="form-control" Value="<?php echo $username; ?>" placeholder="username" tabindex="3" required/>
                            <span class="errors" id="usernameerror"></span>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label  for="omdp" >E-mail :</label>
                            <input type="email" name="email" id="email" class="form-control" Value="<?php echo $email; ?>" placeholder="Email" tabindex="4">
                            <span class="errors" id="emailerror"></span>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                            <label  for="omdp" >Adresse :</label>
                            <input type="text" name="adresse" id="adresse" class="form-control" Value="<?php echo $adresse; ?>" placeholder="Adresse" tabindex="5">
                            <span class="errors" id="adresseerror"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label for="omdp" >Numéro de téléphone :</label>
                            <input type="text" name="phone" id="phone" class="form-control" Value="<?php echo $numero_telephone; ?>" placeholder="Numéro de téléphone" tabindex="6">
                            <span class="errors" id="phoneerror"></span>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label for="omdp" >Commune :</label>
                            <input type="text" name="commune" id="commune" class="form-control" list="noms_communes" Value="<?php echo $code_postal; ?>" placeholder="Commune" tabindex="7">
                            <span class="errors" id="communeerror"></span>
                            <datalist id="noms_communes">
                                <?php include "Models/autocomplete_commune.php"; ?>
                            </datalist>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6 form-group">
                            <label  for="omdp" >Ancien mot de passe :</label>
                            <input class="form-control" type="password" name="Mot de passe" id="omdp"  tabindex="8"/>
                            <div class="errors" id="oldMdperror"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6 form-group">
                            <label  for="nmdp" >Nouveau mot de passe :</label>
                            <input class="form-control" id="nmdp" type="password" name="New mot de passe"  tabindex="9"/>
                            <div class="errors" id="newMdperror"></div>
                        </div>
                        <div class="col-xs-12 col-md-6 form-group">
                            <label  for="mdpc" >Confirmez le nouveau mot de passe :</label>
                            <input class="form-control" id="mdpc" type="password" name="Conf new mot de passe"  tabindex="10"/>
                            <div class="errors" id="cnewMdperror"></div>
                        </div>

                    </div>

                    <div class="row">
                        <!-- <div class="col-md-4 col-lg-2 hidden-xs hidden-sm">
                            <img src="Images/Users/<?php echo $path_photo ?>"  width="150" height="150">
                        </div> -->
                        <div class="col-xs-12 from-group">
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

                    <div class="form-group">
                    <div class="profile-userbuttons">
                        <button type="submit" class="btn btn-lg btn-default btn-success" id="modifProf" name="modifProf">Modifier mon profil</button>
                        <span class="errors" id="formerror"></span>
                        <!-- <button type="button" class="btn btn-lg btn-default btn-danger" data-dismiss="modal" id="dismiss-button2">Annuler</button> -->
                    </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contenu pour supprimer son compte -->
        <div class="col-sm-9 col-md-10 page-step" id="page-step-3">
            <div class="profile-content">

                <div class="form-group col-md-12 form-group">
                    <label  for="omdp" >Username :</label>
                    <input type="text" name="username" id="username" class="form-control" Value="<?php echo $username; ?>" placeholder="username" tabindex="3" required/>
                    <span class="errors" id="usernameerror"></span>
                </div>

                <div class="form-group col-md-12 form-group">
                    <label  for="omdp" >E-mail :</label>
                    <input type="email" name="email" id="email" class="form-control" Value="<?php echo $email; ?>" placeholder="Email" tabindex="4">
                    <span class="errors" id="emailerror"></span>
                </div>

                <!--<div class="form-group col-md-12 form-group">
                    <label for="motif"> Motif :</label>
                    <textarea class="form-control" id="motif" name="motif" placeholder="Pourquoi souhaitez-vous supprimer votre compte ? " ></textarea>
                </div>-->


                <?php
                if (nb_prets_emprunts_actifs($id) != 0)
                {
                    $_SESSION['message'] = "<strong>Vous avez des prêts ou des emprunts en cours.<br>Veuillez les terminer avant de pouvoir supprimer votre compte.</strong>";
                    ?>
                    <div class="form-group">
                        <div class="profile-userbuttons">
                            <a href="monCompte.php" class="btn btn-lg btn-default btn-danger" id="delete" name="delete">Supprimer
                                mon compte</a>
                            <span class="errors" id="formerror"></span>
                            <!-- <button type="button" class="btn btn-lg btn-default btn-danger" data-dismiss="modal" id="dismiss-button2">Annuler</button> -->
                        </div>
                    </div>
                    <?php
                }

                else
                {
                    ?>
                    <div class="form-group">
                        <div class="profile-userbuttons">
                            <button class="btn btn-lg btn-default btn-danger" id="delete" name="delete">Supprimer
                                mon compte</button>
                            <span class="errors" id="formerror"></span>
                            <!-- <button type="button" class="btn btn-lg btn-default btn-danger" data-dismiss="modal" id="dismiss-button2">Annuler</button> -->
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>


        </div> <!-- fermeture du row general -->
    </div> <!-- fermeture du content -->
</div>
</body>
</html>
