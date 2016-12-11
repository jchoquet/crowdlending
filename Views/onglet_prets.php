<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 30/11/2016
 * Time: 17:30
 */

include_once __DIR__ . "/affichage_etat.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
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


<div class="container content">
    <h2>Historique des demandes de prêts</h2>

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filtrer par :
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="./historique?etat=En+attente">En attente</a></li>
            <li><a href="./historique?etat=css">CSS</a></li>
            <li><a href="#">JavaScript</a></li>
        </ul>
    </div>

    <p>Liste des demandes :</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Demandé par...</th>
            <th>Etat</th>
            <th>Recevoir l'objet</th>
        </tr>
        </thead>

        <tbody>

        <?php
        $num = 0; // "num" sert à créer les numéros des lignes du tableau
        $informations_prets = get_historique_prets(); // on récupère les informations des objets disponibles de l'utilisateur

        if (sizeof($informations_prets) != 0) {
            foreach ($informations_prets as $infor) {
                $num += 1;

                if ($num > $page_prets * $DIV) // si on a atteint les objets de la page suivante, on s'arrête
                    break;

                if ($num <= ($page_prets - 1) * $DIV) // si on parcourt les objets des pages précédentes, on continue
                    continue;

                $id_pret = $infor[0];
                $id_objet = $infor[3];

                $etat = $infor[5];
                $isReturned = $infor[6];
                global $etatRequis;
                if ($etatRequis == affichage_etat($etat, $isReturned) || $etatRequis =="") {


                    //Stockage de l'id dans tr pour le javascript
                    print "<tr id=\"$id_pret\">";
                    print "<td class='numObj'>" . $num . "</td>";


                    $path_photo = "Images/Objets/" . $infor[1];
                    $nom = $infor[2];
                    $username_borrower = $infor[4];
                    $pageTraiter = "demandeTraiter.php?id=" . $id_pret . "&type=2";

                    print "<td class='imgObj'>";
                    print "<img src=\"$path_photo\" class=\"img-thumbnail\" alt=\"$nom\" width=\"76\" height=\"59\">"; // on réduit la taille des images
                    print "</td>";

                    print "<td class='nomObj'>" . $nom . "</td>";

                    print "<td class='username_borrower'><a href='view_profil.php?username=$username_borrower'>" . $username_borrower . "</a></td>";

                    print "<td class='etat'>" . affichage_etat($etat, $isReturned) . "</td>";

                    print "<td>";
                    if ($isReturned == 0 && $etat == 1) {
                        print "
                            <div id=\"confirmer\" class=\"btn btn-success\"  data-nom=\"$nom\" data-link=\"$pageTraiter\">
                                <span class=\"glyphicon glyphicon-thumbs-up\" aria-hidden=\"true\"></span> confirmer
                            </div>
                          ";
                    }
                    print "</td>";


                    print "</tr>";
                }
            }
        } else
            print "Vous n'avez aucune demande de prêt.";
        ?>

        </tbody>
    </table>
</div>

<!-- Pour les pages, on crée des boutons "précédent" et "suivant" -->
<div class="text-center">
    <?php $surplus = $num > $page_prets * $DIV; ?>
    <!-- "surplus" sert à savoir s'il y a trop d'objets pour une seule page -->
    <ul class="pagination">
        <?php if ($page_prets > 1): ?>
            <li><a href="?page_prets=<?php echo $page_prets - 1; ?>">«</a></li>
            <li><a href="?page_prets=<?php echo $page_prets - 1; ?>"><?php echo $page_prets - 1; ?></a></li>
            <li class="active"><a href="#"><?php echo $page_prets; ?></a></li>
        <?php endif; ?>
        <?php if ($surplus): ?>
            <?php if ($page_prets == 1): ?>
                <li class="active"><a href="#"><?php echo $page_prets; ?></a></li>
            <?php endif; ?>
            <li><a href="?page_prets=<?php echo $page_prets + 1; ?>"><?php echo $page_prets + 1; ?></a></li>
            <li><a href="?page_prets=<?php echo $page_prets + 1; ?>">»</a></li>
        <?php endif; ?>
    </ul>
</div>

<!-- Modal pour button "confirmer"-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Message d'avertissement</h4>
            </div>
            <div class="modal-body">
                <p id="messageConfirmation"></p>
                <p><br/>Êtes-vous sûr de vouloir continuer ?</p>
            </div>
            <div class="modal-footer">
                <a id="link-button" role="button" class="btn btn-success">Confirmer</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="dismiss-button">
                    Annuler
                </button>
            </div>
        </div>
    </div>
</div>

<div class="disclaimer">
	<p> Veuillez mettre à jour le statut d'un prêt en cliquant sur le pouce lorsque vous avez rendu l'objet.</p>
	<p> En cas de litige, veuillez contactez un administrateur du site.</p>
</div>

</body>
</html>