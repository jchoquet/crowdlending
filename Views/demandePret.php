<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 24/11/2016
 * Time: 16:03
 */

include "Controls/mesObjetsCtrl.php";
include "Models/demandePretM.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Lend it - Mes objets demandés</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Source jquery -->
    <script src="Scripts/jquery_library.js"></script>
    <!-- Source JavaScript Bootstrap -->
    <script src="Scripts/bootstrap.js"></script>

    <!-- Script pour faire cacher les boutons après que l'utilisateur ait cliqué dessus -->
    <script src="Scripts/demandePretS.js"></script>

    <!-- Source CSS Bootstrap -->
    <link rel="stylesheet" href="Styles/bootstrap.css">

    <!-- Source css pour le design du site -->
    <link rel="stylesheet" href="Styles/base.css">
    <!-- Source css pour cette page -->
    <link rel="stylesheet" href="Styles/mesObjets.css">

    <script>
        if ($(window).width() > 768)
        {
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
    <h2>Mes objets demandés</h2>

    <p>Liste des demandes :</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Demandé par...</th>
            <th></th>
        </tr>
        </thead>

        <tbody>

        <?php
        $num = 0; // "num" sert à créer les numéros des lignes du tableau
        $informations_prets = get_waiting_pret(); // on récupère les informations des objets disponibles de l'utilisateur

        if (sizeof($informations_prets) != 0) {
            foreach ($informations_prets as $infor) {
                $num += 1;

                if ($num > $page * $DIV) // si on a atteint les objets de la page suivante, on s'arrête
                    break;

                if ($num <= ($page - 1) * $DIV) // si on parcourt les objets des pages précédentes, on continue
                    continue;

                $id_pret = $infor[0];
                $id_objet = $infor[3];


                //Stockage de l'id dans tr pour le javascript
                print "<tr id=\"$id_pret\">";
                print "<td class='numObj'>" . $num . "</td>";


                $path_photo = "Images/Objets/" . $infor[1];
                $nom = $infor[2];
                $username_borrower = $infor[4];

                print "<td class='imgObj'>";
                print "<img src=\"$path_photo\" class=\"img-thumbnail\" alt=\"$nom\" width=\"76\" height=\"59\">"; // on réduit la taille des images
                print "</td>";

                print "<td class='nomObj'>" . $nom . "</td>";

                print "<td class='username_borrower'><a href='view_profil.php?username=$username_borrower'>" . $username_borrower . "</a></td>";

                print "<td class='choix_pret'>";


                print "<div class=\"btn btn-danger btn-lg pull-right\" onclick=\"refuser(this, $id_pret, $id_objet)\">
              <span class=\"glyphicon glyphicon-remove\">Refuser</span>
            </div>";

                print "<div class=\"espace btn pull-right\"></div>"; // pour qu'il y ait un espace entre les 2 boutons
                // et sert à afficher le texte de résultat "Demande acceptée" ou "Demande refusée"

                print "<div class=\"btn btn-success btn-lg pull-right\" onclick=\"accepter(this, $id_pret)\">
              <span class=\"glyphicon glyphicon-ok\">Accepter</span>
            </div>";

                ?>

                <?php

                print "</td>";
                print "</tr>";
            }
        }
        else
            print "Vous n'avez aucune demande de prêt.";
        ?>

        </tbody>
    </table>
</div>

<!-- Pour les pages, on crée des boutons "précédent" et "suivant" -->
<div class="text-center">
    <?php $surplus = $num > $page * $DIV; ?> <!-- "surplus" sert à savoir s'il y a trop d'objets pour une seule page -->
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li><a href="<?php echo "demandePret.php?page=" . ($page - 1); ?>">«</a></li>
            <li><a href="<?php echo "demandePret.php?page=" . ($page - 1); ?>"><?php echo $page - 1; ?></a></li>
            <li class="active"><a href="#"><?php echo $page; ?></a></li>
        <?php endif; ?>
        <?php if ($surplus): ?>
            <?php if ($page == 1): ?>
                <li class="active"><a href="#"><?php echo $page; ?></a></li>
            <?php endif; ?>
            <li><a href="<?php echo "demandePret.php?page=" . ($page + 1); ?>"><?php echo $page + 1; ?></a></li>
            <li><a href="<?php echo "demandePret.php?page=" . ($page + 1); ?>">»</a></li>
        <?php endif; ?>
    </ul>
</div>


<?php include("footer.php"); ?>
</body>


</html>
