<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 30/11/2016
 * Time: 17:21
 */

include "Controls/mesObjetsCtrl.php";
include "Models/historiqueM.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Lend it - Mon historique</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Source jquery -->
    <script src="Scripts/jquery_library.js"></script>
    <!-- Source JavaScript Bootstrap -->
    <script src="Scripts/bootstrap.js"></script>

    <!-- Source CSS Bootstrap -->
    <link rel="stylesheet" href="Styles/bootstrap.css">

    <!-- Source css pour le design du site -->
    <link rel="stylesheet" href="Styles/base.css">
    <!-- Source css pour cette page -->
    <link rel="stylesheet" href="Styles/mesObjets.css">

</head>
<body>

<?php include "header.php"; ?>

<div class="container">

    <h2><br></h2> <!-- pour que les onglets ne soient pas masqués par le header -->

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#onglet_prets">Mes prêts</a></li>
        <li><a data-toggle="tab" href="#onglet_emprunts">Mes emprunts</a></li>
    </ul>

    <div class="tab-content">
    <div id="onglet_prets" class="tab-pane fade in active">
        <?php include "onglet_prets.php"; ?>
    </div>
    <div id="onglet_emprunts" class="tab-pane fade">
        <?php include "onglet_emprunts.php"; ?>
    </div>
    </div>
</div>


<?php include "footer.php"; ?>

</body>
</html>
