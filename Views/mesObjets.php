<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 13/11/2016
 * Time: 18:28
 */

include "Controls/mesObjetsCtrl.php";
include "Models/mesobjetsM.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Lend it - Mes objets</title>
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

<?php include("header.php"); ?>

<div class="container content">
    <h2>Mes objets</h2>

    <?php
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'];
    if (isset($_REQUEST['delete']))
    {
        $id_to_delete = $_REQUEST['delete'];
        $nom = objet_to_delete($id_to_delete);

        if (delete_objet($id_to_delete))
            print "L'objet \"$nom\" a bien été supprimé." . "<br>";
        else
            if (!$pageWasRefreshed)
                print "Erreur : l'objet \"$nom\" n'a pas été supprimé.";
        $_REQUEST['delete'] = NULL;
    }
    ?>

    <p>Liste de mes objets :</p>
    <table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Nom</th>
            <th></th>
        </tr>
    </thead>

    <tbody>

    <?php
    $num = 0; // "num" sert à créer les numéros des lignes du tableau
    $informations_objets = get_available_objets(); // on récupère les informations des objets disponibles de l'utilisateur

    if (sizeof($informations_objets) != 0) {
        foreach ($informations_objets as $infor) {
            $num += 1;

            if ($num > $page * $DIV) // si on a atteint les objets de la page suivante, on s'arrête
                break;

            if ($num <= ($page - 1) * $DIV) // si on parcourt les objets des pages précédentes, on continue
                continue;

            print "<tr>";
            print "<td>" . $num . "</td>";

            $path_photo = "Images/Objets/" . $infor[0];
            $nom = $infor[1];

            print "<td>";
            print "<img src=\"$path_photo\" class=\"img-thumbnail\" alt=\"$nom\" width=\"76\" height=\"59\">"; // on réduit la taille des images
            print "</td>";

            print "<td>" . $nom . "</td>";

            print "<td>";

            // Si l'utilisateur supprime le dernier objet de la dernière page et qu'il ne restait que cet objet dans cette page,
            // on revient à la page précédente (sauf si la page actuelle est la page 1)
            if ($num == ($page - 1) * $DIV + 1 and $num == sizeof($informations_objets) and $page != 1) {
                $newpage = $page - 1;
                $page_after_delete = "mesObjets.php?page=" . $newpage . "&delete=" . $infor[2];
            } else
                $page_after_delete = "mesObjets.php?page=" . $page . "&delete=" . $infor[2];

            print "<div class=\"btn btn-danger btn-lg\" data-toggle=\"modal\" data-target=\"#myModal\" data-nom=\"$nom\" data-link=\"$page_after_delete\">
              <span class=\"glyphicon glyphicon-trash\"></span>
            </div>";

            ?>

            <!-- http://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal_sm&stacked=h -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Message d'avertissement</h4>
                        </div>
                        <div class="modal-body">
                            <p>Vous allez supprimer l'objet <?php echo $nom; ?>.</p>
                            <p>Êtes-vous sûr de vouloir continuer ?</p>
                        </div>
                        <div class="modal-footer">
                            <a id="link-button" role="button" class="btn btn-default">Supprimer l'objet</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss-button">
                                Annuler
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="Scripts/mesObjetsS.js"></script>

            <?php

            print "</tr>";
        }
    }

    else
        print "Vous n'avez aucun objet disponible.";
    ?>

    </tbody>
    </table>
</div>

<!-- Pour les pages, on crée des boutons "précédent" et "suivant" -->
<div class="text-center">
    <?php $surplus = $num > $page*$DIV; ?> <!-- "surplus" sert à savoir s'il y a trop d'objets pour une seule page -->
    <ul class="pagination">
        <?php if($page > 1): ?>
            <li><a href="<?php echo "mesObjets.php?page=".($page-1); ?>">«</a></li>
            <li><a href="<?php echo "mesObjets.php?page=".($page-1); ?>"><?php echo $page-1; ?></a></li>
            <li class="active"><a href="#"><?php echo $page; ?></a></li>
        <?php endif; ?>
        <?php if($surplus): ?>
            <?php if($page == 1): ?>
                <li class="active"><a href="#"><?php echo $page; ?></a></li>
            <?php endif; ?>
            <li><a href="<?php echo "mesObjets.php?page=".($page+1); ?>"><?php echo $page+1; ?></a></li>
            <li><a href="<?php echo "mesObjets.php?page=".($page+1); ?>">»</a></li>
        <?php endif; ?>
    </ul>
</div>

<?php include("footer.php"); ?>

</body>
</html>
