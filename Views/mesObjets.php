<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 13/11/2016
 * Time: 18:28
 */

include "Controls/mesObjetsCtrl.php";
include "Models/mesobjetsM.php";
include "Models/mesobjetsD.php";
include "Models/mesObjetsGet.php";

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
    <link rel="stylesheet" href="Styles/popupObjets.css">

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
    <h2>Mes objets</h2>

    <?php
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'];
    if (isset($_REQUEST['delete'])) {
        $id_to_delete = $_REQUEST['delete'];
        $nom = objet_to_delete($id_to_delete);

        if (delete_objet($id_to_delete))
        {
            //print "L'objet \"$nom\" a bien été supprimé";
            ?>
            <div class="alert alert-success alert-dismissable fade in" >
                <a href = "#" class="close" data-dismiss = "alert" aria-label = "close" >&times;</a >
                L'objet <?php echo $nom; ?> a bien été supprimé.
            </div >
        <?php
        }
        
        else
            if (!$pageWasRefreshed)
            {
                ?>
                <div class="alert alert-danger alert-dismissable fade in" >
                    <a href = "#" class="close" data-dismiss = "alert" aria-label = "close" >&times;</a >
                    <strong > Erreur !</strong > L'objet <?php echo $nom; ?> n'a pas été supprimé.
                </div >
            <?php
            }
        
        $_REQUEST['delete'] = NULL;
    }
    
    if (!empty($_SESSION['message'])) 
    {
        if (strpos($_SESSION['message'], "problème") === false)
        {
            ?>
            <div class="alert alert-success alert-dismissable fade in" >
                <a href = "#" class="close" data-dismiss = "alert" aria-label = "close" >&times;</a >
                <?php echo $_SESSION['message']; ?>
            </div >
        <?php
        }
        else
        {
            ?>
            <div class="alert alert-danger alert-dismissable fade in" >
                <a href = "#" class="close" data-dismiss = "alert" aria-label = "close" >&times;</a >
                <?php echo $_SESSION['message']; ?>
            </div >
            <?php
        }

        $_SESSION['message'] = NULL;
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

                $id = $infor[2];


                //Stockage de l'id dans tr pour le javascript
                print "<tr id=\"$id\">";
                print "<td class='numObj'>" . $num . "</td>";


                $path_photo = "Images/Objets/" . $infor[0];
                $nom = $infor[1];

                print "<td class='imgObj'>";
                print "<img src=\"$path_photo\" class=\"img-thumbnail\" alt=\"$nom\" width=\"76\" height=\"59\">"; // on réduit la taille des images
                print "</td>";

                print "<td class='nomObj'>" . $nom . "</td>";

                print "<td class='supObj'>";


                // Si l'utilisateur supprime le dernier objet de la dernière page et qu'il ne restait que cet objet dans cette page,
                // on revient à la page précédente (sauf si la page actuelle est la page 1)
                if ($num == ($page - 1) * $DIV + 1 and $num == sizeof($informations_objets) and $page != 1) {
                    $newpage = $page - 1;
                    $page_after_delete = "mesObjets.php?page=" . $newpage . "&delete=" . $infor[2];
                } else
                    $page_after_delete = "mesObjets.php?page=" . $page . "&delete=" . $infor[2];


                //$page_apres_modification = "mesObjets.php?page=" . $page . "&modifier=" . $infor[2];

                $page_apres_modification = "Controls/verificationObjectM.php";
                $iid = $infor[2];

                print "<div class=\"button-container\"><div id=\"modif-btn-list\" class=\"btn btn-success btn-lg boutonModif\" data-nom=\"$iid\" data-link=\"$page_apres_modification\">
                <span class=\"glyphicon glyphicon-cog\"></span>

            </div>";

                print "&nbsp; &nbsp;";
                
                print "<div id=\"boutonSuppression\" class=\"btn btn-danger btn-lg pull-right boutonSuppression\" data-nom=\"$nom\" data-link=\"$page_after_delete\">
            <span class=\"glyphicon glyphicon-trash\"></span>
        </div>";

                ?>

                <?php

                print "</td>";
                print "</tr>";
            }
        } else
            print "Vous n'avez aucun objet disponible.";
        ?>

        </tbody>
    </table>
</div>

<!-- Pour les pages, on crée des boutons "précédent" et "suivant" -->
<div class="text-center">
    <?php $surplus = $num > $page * $DIV; ?> <!-- "surplus" sert à savoir s'il y a trop d'objets pour une seule page -->
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li><a href="<?php echo "mesObjets.php?page=" . ($page - 1); ?>">«</a></li>
            <li><a href="<?php echo "mesObjets.php?page=" . ($page - 1); ?>"><?php echo $page - 1; ?></a></li>
            <li class="active"><a href="#"><?php echo $page; ?></a></li>
        <?php endif; ?>
        <?php if ($surplus): ?>
            <?php if ($page == 1): ?>
                <li class="active"><a href="#"><?php echo $page; ?></a></li>
            <?php endif; ?>
            <li><a href="<?php echo "mesObjets.php?page=" . ($page + 1); ?>"><?php echo $page + 1; ?></a></li>
            <li><a href="<?php echo "mesObjets.php?page=" . ($page + 1); ?>">»</a></li>
        <?php endif; ?>
    </ul>
</div>


<!-- http://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal_sm&stacked=h -->
<!-- Modal delete-->
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
                <a id="link-button" role="button" class="btn btn-danger">Supprimer l'objet</a>
                <button type="button" class="btn btn-success" data-dismiss="modal" id="dismiss-button">
                    Annuler
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal information objet-->

<div id="myObject" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="closePopup">&times;</button>
                <h4 class="modal-title" id="nomObjetPopup"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <img id="photoObjet" src="" class="picturePopup col-md-5"/>
                    <div class="col-md-7">
                        <h3>Description :</h3>
                        <p id="descriptionObjet"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="closeModalObject">Close</button>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="modifObj" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label for="titre">Modifier votre objet : <div id="nomObjetModifTitre" </label>
                <button type="button" class="close" data-dismiss="modal" id="closePopup">&times;</button>
                <h4 class="modal-title" id="nomObjetPopup"></h4>
            </div>

            <div class="modal-body">
                <form role="form" id="modifObj-form" method="POST" action="Controls/verificationObjectM.php">
                    <div class="row">
                        <div class="form-group">
                            <label for="titre">Nom d'objet :</label>
                            </br>
                            <input type="text" class="form-control" id="titreModif" name="titre" placeholder="Titre"
                                   value="" required/>
                            <span class="errors" id="titreerror"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="description">Description de l'objet :</label>
                            </br>
                            <input type="textarea" class="form-control" id="descriptionModif" name="description"
                                   placeholder="Description de votre objet" value="">
                            <span class="errors" id="descriptionerror"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label>Photo de l'objet :</label>
                            <div class="col-md-12">
                                <img id="imgModif" src="" width="150" height="150">
                                <div class="input-group">
                                    <label class="input-group-btn" for="photo">
                                        <span class="btn btn-info"><span class="glyphicon glyphicon-picture"></span>
                                        Sélectionner une photo <input type="file" id="photo" name="photo"
                                                                      style="display: none;"/>
                                    </span>
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" readonly="" value="Aucun fichier choisi"/>
                                </div>
                            </div>


                        </div>
                    </div>

                    <input type="hidden" id="identifiantObjet" name="identifiantObjet" value=""/>

                    <p class="lead text-center">
                        <button type="submit" class="btn btn-lg btn-default btn-success" id="modifObj-btn"
                                name="modifObj">Modifier l'objet
                        </button>
                        <button type="button" class="btn btn-lg btn-default btn-danger" data-dismiss="modal"
                                id="dismiss-button2">Annuler
                        </button>
                    </p>
                    <span class="errors" id="formerror"></span>
                </form>
            </div>
            <div class="modal-footer">
                <p>test</p>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php"); ?>
</body>

<script type="text/javascript" src="Scripts/config.js"></script>
<script type="text/javascript" src="Scripts/popupObjet.js"></script>
<script type="text/javascript" src="Scripts/mesObjetsS.js"></script>

</html>
