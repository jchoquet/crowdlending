<?php
/**
 * Created by PhpStorm.
 * User: Qiuhao
 * Date: 26/11/2016
 * Time: 18:00
 */

include __DIR__ . "/../Models/rechercheM.php";

//Récupération des variables entrées en $_GET

if(isset($_GET['owner'])){
    $owner_id = $_GET['owner'];
}
else
    $owner_id = "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Lend it - emailPreteur</title>
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
    <script>
        if ($(window).width() > 768) {
            <?php $DIV = 5; ?> /* tablet : 8 */
        }
        if ($(window).width() > 992) /* ordi : 10 */
        {
            <?php $DIV = 5; ?>
        }
    </script>
</head>
<body>

<?php include("header.php"); ?>

<div class="container content">
    <h2>L'émail de prêteur</h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>username</th>
            <th>email</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <?php
        $informations_preteur = get_email($owner_id); // on récupère les informations de prêteur
        if ($informations_preteur != NULL) {
            $username = $informations_preteur['username'];
            $email = $informations_preteur['email'];
            print "<td>$username</td>";
            print "<td>$email</td>";
        } else
            print "Aucun user n'a été trouvé";
        ?>
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>
</body>

<script type="text/javascript" src="Scripts/config.js"></script>

</html>