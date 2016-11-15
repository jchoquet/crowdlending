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

    <!-- CSS pour la page -->
    <link rel="stylesheet" href="../Styles/bootstrap.css">
    <link rel="stylesheet" href="../Styles/inscription.css">

    <!-- CSS pour l'icone retour -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>

<body>

    <?php include __DIR__."./formulaireInscription.php"; ?>

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

<!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
<![endif]-->

<script src="../Scripts/jquery_library.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="../Scripts/bootstrap.js"></script>

<script src="../Scripts/config.js"></script>
<script src="../Scripts/inscription.js"></script>


</body>
</html>
