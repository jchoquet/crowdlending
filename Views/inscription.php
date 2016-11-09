<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 01/11/2016
 * Time: 22:31
 */
?>

<!doctype html>

<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>Lend it</title>

    <meta name="description" content="Page d'inscription sur le site">
    <meta name="author" content="Mehdi KHADIR">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../Styles/bootstrap.css"/>

    <!-- CSS pour l'icone retour -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- CSS pour la page -->
    <link rel="stylesheet" href="../Styles/connexionFormulaire.css">
</head>

<body>

    <?php include("formulaireInscription.php"); ?>

    <!-- Modal -->
    <div id="pbInscription" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closePbInscription">&times;</button>
                    <h3 class="modal-title"><img src="../Images/warning-icon-png-2749.png" id="warningIcon">Problème lors de votre inscription</h3>
                </div>
                <div class="modal-body">
                    <p id="problemName"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>

        </div>
    </div>

</body>

    <script src="../Scripts/jquery_library.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../Scripts/bootstrap.js"></script>

    <script src="../Scripts/inscription.js"></script>

</html>
