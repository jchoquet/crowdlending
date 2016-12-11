<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lend it - Nous contacter</title>

    <!-- Source CSS Bootstrap -->
    <link rel="stylesheet" href="Styles/bootstrap.css">

    <!-- Source css pour le design du site -->
    <link rel="stylesheet" href="Styles/base.css">

    <!-- Source css pour la page-->
    <link rel="stylesheet" href="Styles/contact.css">

    <!-- Source jquery -->
    <script src="Scripts/jquery_library.js"></script>

    <!-- Source JavaScript Bootstrap -->
    <script src="Scripts/bootstrap.js"></script>

</head>

<body>

<?php include("Views/header.php"); ?>

    <div class="container content">

        <div class="heading">
            <h2>Nous <strong>contacter</strong></h2>
        </div>

        <p class="lead">Vous avez une question, une réclamation ou vous souhaitez simplement obtenir plus d'informations ?</p>
        <p>Vous pouvez contacter l'équipe de modération / administration aux coordonnées suivantes :</p>

        <div class="container icones">
            <div class="row text-center">
                <div class="col-sm-4 col-xs-6 third-box">
                    <h1><span class="glyphicon glyphicon-send"></span></h1>
                    <h3>E-mail</h3>
                    <p>contact@lendit.com</p><br>
                </div>

                <div class="col-sm-4 col-xs-6 first-box">
                    <h1><span class="glyphicon glyphicon-earphone"></span></h1>
                    <h3>Téléphone</h3>
                    <p>01 11 22 33 44</p><br>
                </div>

                <div class="col-sm-4 col-xs-6 second-box">
                    <h1><span class="glyphicon glyphicon-home"></span></h1>
                    <h3>Adresse</h3>
                    <p>1 square de la Résistance, 91000 Evry</p><br>
                </div>
            </div>
        </div>
    </div>


<?php include ("Views/footer.php"); ?>

</body>
</html>
