<?php

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

    <link rel="stylesheet" href="Styles/view_profil.css">

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
      echo '<h2 class="page-header">Votre profil, vu par les autres</h2>';
    }
    else
    {
      echo '<h2 class="page-header">Profil de '.$username.'</h2>';
    }
  ?>
 <div class="row">
    <div class="col-xs-12 col-sm-4 col-md-offset-1 col-md-2">
        <div class="thumbnail">
            <img src="<?php echo $path_photo; ?>" alt='avatar' >
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
              <td><?php echo $username; ?></td>
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
              <td><?php echo $code_postale; ?></td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include('Views/footer.php'); ?>

</body>;
</html>
