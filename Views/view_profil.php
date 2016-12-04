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
  <p> Profil de <?php echo $informations[0][2]; ?></p>
</div>

<?php include('Views/footer.php'); ?>

</body>;
</html>
