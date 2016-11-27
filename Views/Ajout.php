<?php
    session_start();
?>
<!doctype html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lend it - Ajouter un objet</title>
    <meta name="description" content="Page d'ajout d'objet">
    <meta name="author" content="Mahrous Anouar">

    <!-- Source CSS Bootstrap -->
    <link rel="stylesheet" href="Styles/bootstrap.css">

    <!-- Source css pour le design du site -->
    <link rel="stylesheet" href="Styles/base.css">

    <!-- Source pour le formulaire d'ajout -->
    <link rel="stylesheet" href="Styles/ajout.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Source jquery -->
    <script src="Scripts/jquery_library.js"></script>
    <!-- Source JavaScript Bootstrap -->
    <script src="Scripts/bootstrap.js"></script>
    <script src="Scripts/ajout.js"></script>

</head>

<body>
    <?php
    include("header.php");
    include("formulaireAjout.php");
    include("footer.php");
    ?>
</body>
</html>
