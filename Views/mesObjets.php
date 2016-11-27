<?php


include "Controls/mesObjetsCtrl.php";
include "Models/mesobjetsM.php";
include "Models/mesobjetsD.php";
include "Views/modif2.php";


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Lend it - Mes objets</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles/bootstrap.css">
    <link rel="stylesheet" href="Styles/mesObjets.css">
    <link rel="stylesheet" href="Styles/popupObjets.css">


    <script src="Scripts/jquery_library.js"></script>
    <script src="Scripts/bootstrap.js"></script>
    <script type="text/javascript" src="Scripts/ajout.js"></script>
    <script type="text/javascript" src="Scripts/mesObjetsS.js"></script>

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

<div class="container content">
    <h2>Mes objets</h2>

    <?php
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'];
    if (isset($_REQUEST['delete'])) {
        $id_to_delete = $_REQUEST['delete'];
        $nom = objet_to_delete($id_to_delete);

        if (delete_objet($id_to_delete))
        {
            print "L'objet \"$nom\" a bien été supprimé";
        }
        else
            if (!$pageWasRefreshed) {
                print "<strong > Erreur !</strong > L'objet \"$nom\" n'a pas été supprimé";
            }
        $_REQUEST['delete'] = NULL;
    }

    /*if (isset($_REQUEST['modifier']))
    {
        $id_to_modifier = $_REQUEST['modifier'];
        $nom = objet_to_modifier($id_to_modifier);

        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $prix = 0;
        $isAvailable = 1;
        $path_photo = 'photo';


        if (modifier_objet($id_to_modifier , $titre , $prix , $isAvailable , $path_photo , $description)){
            print "<div class='alert alert-success alert-dismissible'>";
            print "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
            print "L'objet \"$nom\" a bien été modifié";
            print "</div >";}
        else
            if (!$pageWasRefreshed){
                print "<div class='alert alert-danger alert-dismissible'>";
                print "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
                print "<strong > Erreur !</strong > L'objet \"$nom\" n'a pas été modifié";
                print "</div >";}
        $_REQUEST['modifier'] = NULL;
    }*/

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
        $num = 0; // "num" sert Ã  créer les numéros des lignes du tableau
        $informations_objets = get_available_objets(); // on récupÃ¨re les informations des objets disponibles de l'utilisateur

        if (sizeof($informations_objets) != 0) {
            foreach ($informations_objets as $infor) {
                $num += 1;

                if ($num > $page * $DIV) // si on a atteint les objets de la page suivante, on s'arrÃªte
                    break;

                if ($num <= ($page - 1) * $DIV) // si on parcourt les objets des pages précédentes, on continue
                    continue;

                print "<tr>";
                print "<td>" . $num . "</td>";

                $path_photo = "../Images/Objets/" . $infor[0];
                $nom = $infor[1];

                print "<td>";
                print "<img src=\"$path_photo\" class=\"img-thumbnail\" alt=\"$nom\" width=\"76\" height=\"59\">"; // on réduit la taille des images
                print "</td>";

                print "<td>" . $nom . "</td>";

                print "<td>";

                // Si l'utilisateur supprime le dernier objet de la derniÃ¨re page et qu'il ne restait que cet objet dans cette page,
                // on revient Ã  la page précédente (sauf si la page actuelle est la page 1)
                if ($num == ($page - 1) * $DIV + 1 and $num == sizeof($informations_objets) and $page != 1) {
                    $newpage = $page - 1;
                    $page_after_delete = "mesObjets.php?page=" . $newpage . "&delete=" . $infor[2];
                }
                else {
                    $page_after_delete = "mesObjets.php?page=" . $page . "&delete=" . $infor[2];
                }

                //$page_apres_modification = "mesObjets.php?page=" . $page . "&modifier=" . $infor[2];

                $page_apres_modification="../Controls/verificationObjectM.php";
                $iid=$infor[2];


                print "<div class=\"btn btn-success btn-lg\" data-toggle=\"modal\" data-target=\"#modifObj\" data-nom=\"$iid\" data-link=\"$page_apres_modification\">
              <span class=\"glyphicon glyphicon-trash\"></span>
            </div>";

                print "&nbsp; &nbsp;";

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
                                <p> êtes-vous sûr de vouloir continuer ?</p>
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


                <div class="modal fade" id="modifObj" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <label for="titre"> Modifier votre objet : <?php echo "$nom" ?> ! </label>
                                <button type="button" class="close" data-dismiss="modal" id="closePopup">&times;</button>
                                <h4 class="modal-title" id="nomObjetPopup"></h4>
                            </div>

                            <div class="modal-body">
                                <form role="form" id="modifObj" method="POST" action="../Controls/verificationObjectM.php">
                                <div class="row">
                                    <label for="titre"> Nom d'objet :  </label>
                                    </br>
                                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" value="<?php echo getnom($iid); ?>" required/>
                                    <span class="errors" id="titreerror"></span>
                                </div>
                                </br>
                                <div class="row">
                                    <label for="description"> Description de l'objet :</label>
                                    </br>
                                    <input type="textarea" class="form-control" id="description" name="description" placeholder="Description de votre objet" value="<?php echo getdescription($iid); ?>" >
                                    <span class="errors" id="descriptionerror"></span>
                                </div>
                                </br>
                                <div class="row">
                                    <label for="description"> Photo de l'objet :</label>
                                    </br>
                                    <img src="/Images/Objets/<?php echo getphoto($iid); ?>"  width="150" height="150">
                                    <button class="btn btn-default btn-file"><input type="file" id="photo" name="photo" /></button>
                                    </br>
                                </div>
                                    <button type="submit" class="btn btn-default btn-success" id="modifObj" name="modifObj">Modifier l'objet</button>
                                    <span class="errors" id="formerror"></span>
                                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal" id="dismiss-button"> Annuler </button>
                                </form>
                            </div>

                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>


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
    <?php $surplus = $num > $page*$DIV; ?> <!-- "surplus" sert Ã  savoir s'il y a trop d'objets pour une seule page -->
    <ul class="pagination">
        <?php if($page > 1): ?>
            <li><a href="<?php echo "mesObjets.php?page=".($page-1); ?>">Â«</a></li>
            <li><a href="<?php echo "mesObjets.php?page=".($page-1); ?>"><?php echo $page-1; ?></a></li>
            <li class="active"><a href="#"><?php echo $page; ?></a></li>
        <?php endif; ?>
        <?php if($surplus): ?>
            <?php if($page == 1): ?>
                <li class="active"><a href="#"><?php echo $page; ?></a></li>
            <?php endif; ?>
            <li><a href="<?php echo "mesObjets.php?page=".($page+1); ?>"><?php echo $page+1; ?></a></li>
            <li><a href="<?php echo "mesObjets.php?page=".($page+1); ?>">Â»</a></li>
        <?php endif; ?>
    </ul>
</div>

</body>
</html>
