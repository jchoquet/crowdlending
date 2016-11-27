<?php
/**
 * Created by PhpStorm.
 * User: qianqiuhao
 * Date: 16/11/27
 * Time: 上午12:31
 */

include "Models/demandeTraiter.php";
if(isset($_GET['id']))
{
    $objetId = $_GET['id'];
}
else {
    $objetId = "";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Lend it - Objets disponibles</title>
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
</head>
<body>
<?php include("header.php"); ?>

<div class="container content">
    <?php
    if (demande_traiter($objetId)) {
        print "<h3> Votre demande a été bien envoyé </h3>";
    }
    else {
        print "<h3> demande Error </h3>";
    }
    ?>
</div>

<?php include("footer.php"); ?>
</body>

<script type="text/javascript" src="Scripts/config.js"></script>
<script type="text/javascript" src="Scripts/popupObjet.js"></script>
</html>
