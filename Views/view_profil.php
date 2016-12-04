<?php

session_start();
include "Models/monProfil.php";

$username = $_GET['username'];
$id = $_SESSION['login'];
$informations = get_infos_by_username($username);
$idprofil = $informations[0][0];
$nom = $informations[0][1];
$prenom = $informations[0][2];
$email = $informations[0][3];
$path_photo = "Images/Users/".$informations[0][4];
$adresse = $informations[0][5];
$numero_telephone = $informations[0][6];
$id_commune = $informations[0][7];
$code_postale = get_commune($id_commune);


?>


<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lend it - Profil</title>
    <meta name="description" content="Page de Profil">

    <!-- Source CSS Bootstrap -->
    <link rel="stylesheet" href="Styles/bootstrap.css">

    <!-- Source css pour le design du site -->
    <link rel="stylesheet" href="Styles/base.css">

    <!-- Source pour le formulaire dajout -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Source jquery -->
    <script src="Scripts/jquery_library.js"></script>
    <!-- Source JavaScript Bootstrap -->
    <script src="Scripts/bootstrap.js"></script>

</head>

<body>

<?php include("Views/header.php"); ?>

<div class="container-fluid content">
  <?php
    if($id == $idprofil)
    {
      echo '<h1 class="page-header">Votre profil, vu par les autres</h1>';
    }
    else
    {
      echo '<h1 class="page-header">Profil de '.$username.'</h1>';
    }
  ?>
 <div class="row">
    <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="thumbnail">
            <img src="<?php echo $path_photo; ?>" alt='avatar' >
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4Z" id="infos">
        <ul>
          <li><span class="etiquette">Nom :</span><?php echo $nom; ?></li>
          <li><span class="etiquette">Prénom :</span><?php echo $prenom; ?></li>
          <li><span class="etiquette">Nom d'utilisateur :</span><?php echo $username; ?></li>
          <li><span class="etiquette">Email :</span><?php echo $email; ?></li>
          <li><span class="etiquette">Adresse :</span><?php echo $adresse; ?></li>
          <li><span class="etiquette">Numéro :</span><?php echo $numero_telephone; ?></li>
          <li><span class="etiquette">Commune :</span><?php echo $code_postale; ?></li>
        </ul>
    </div>
 </div>
</div>

<?php include('Views/footer.php'); ?>

</body>;
</html>
