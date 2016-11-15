<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 13/11/2016
 * Time: 18:28
 */

session_start();

include __DIR__."/../Controls/mesObjetsCtrl.php";
include __DIR__."/../Models/mesobjetsM.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mes objets</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
    <h2>Mes objets</h2>

    <?php
    if (isset($_REQUEST['delete']))
    {
        $id_to_delete = $_REQUEST['delete'];
        $nom = objet_to_delete($id_to_delete);

        if (delete_objet($id_to_delete))
            print "L'objet \"$nom\" a bien été supprimé." . "<br>";
        else
            print "Erreur : l'objet \"$nom\" n'a pas été supprimé.";
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

    foreach  ($informations_objets as $infor)
    {
        $num += 1;

        if ($num > $page * $DIV) // si on a atteint les objets de la page suivante, on s'arrête
            break;

        if ($num <= ($page - 1) * $DIV) // si on parcourt les objets des pages précédentes, on continue
            continue;

        print "<tr>";
        print "<td>" . $num . "</td>";

        $path_photo = __DIR__."/../Images/Objets/" . $infor[0];
        $nom = $infor[1];

        print "<td>";
        print "<img src=\"$path_photo\" class=\"img-thumbnail\" alt=\"$nom\" width=\"76\" height=\"59\">"; // on réduit la taille des images
        print "</td>";

        print "<td>" . $nom . "</td>";

        print "<td>";
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

        <script type="text/javascript" src="../Scripts/mesObjetsS.js"></script>

        <?php

        print "</tr>";
    }
    ?>

    </tbody>
    </table>
</div>

<!-- Pour les pages, on crée des boutons "précédent" et "suivant" -->
<nav>
    <?php $surplus = $num > $page*$DIV; ?> <!-- "surplus" sert à savoir s'il y a trop d'objets pour une seule page -->
    <ul class="pager">
        <?php if($page > 1): ?>
            <li class="pager-prev"><a href="<?php echo "mesObjets.php?page=".($page-1); ?>">&lt;&lt; précédent</a></li>
        <?php endif; ?>
        <?php if($surplus): ?>
            <li class="pager-next"><a href="<?php echo "mesObjets.php?page=".($page+1); ?>">&gt;&gt; suivant</a></li>
        <?php endif; ?>
    </ul>
</nav>

</body>
</html>
