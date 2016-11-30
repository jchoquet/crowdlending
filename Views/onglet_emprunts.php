<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 30/11/2016
 * Time: 18:03
 */

include_once __DIR__ . "/affichage_etat.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <script>
        if ($(window).width() > 768)
        {
            <?php $DIV = 2; ?> /* tablet : 8 */
        }
        if ($(window).width() > 992) /* ordi : 10 */
        {
            <?php $DIV = 2; ?>
        }
    </script>
</head>
<body>


<div class="container content">
    <h2>Historique des demandes d'emprunts</h2>

    <p>Liste des demandes :</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Emprunté à ...</th>
            <th>Etat</th>
        </tr>
        </thead>

        <tbody>

        <?php
        $num = 0; // "num" sert à créer les numéros des lignes du tableau
        $informations_prets = get_historique_emprunts(); // on récupère les informations des objets disponibles de l'utilisateur

        if (sizeof($informations_prets) != 0)
        {
            foreach ($informations_prets as $infor)
            {
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
                $etat = $infor[5];

                print "<td class='imgObj'>";
                print "<img src=\"$path_photo\" class=\"img-thumbnail\" alt=\"$nom\" width=\"76\" height=\"59\">"; // on réduit la taille des images
                print "</td>";

                print "<td class='nomObj'>" . $nom . "</td>";

                print "<td class='username_borrower'>" . $username_borrower . "</td>";

                print "<td class='etat'>" . affichage_etat($etat) . "</td>";

                
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
            <li><a href="#">«</a></li>
            <li><a href="#"><?php echo $page - 1; ?></a></li>
            <li class="active"><a href="#"><?php echo $page; ?></a></li>
        <?php endif; ?>
        <?php if ($surplus): ?>
            <?php if ($page == 1): ?>
                <li class="active"><a href="#"><?php echo $page; ?></a></li>
            <?php endif; ?>
            <li><a href="#"><?php echo $page + 1; ?></a></li>
            <li><a href="#">»</a></li>
        <?php endif; ?>
    </ul>
</div>

</body>
</html>