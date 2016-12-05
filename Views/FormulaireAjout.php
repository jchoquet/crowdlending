<?php
/**
 * User: MAHROUS ANOUAR
 * Date: 10/11/2016
 */
 include __DIR__ . '/../Controls/ListeCategorie.php';
?>


<div class="content">
    <div class="wrapper">
        <div class="container" id="container-form">
            <form role="form" method="POST" action="Controls/verificationObject.php" enctype="multipart/form-data">

                <div class="row">
                    <fieldset class="field-border col-md-12">
                        <legend class="field-border">Prêtez vos objets en toute sécurité !</legend>
                    </fieldset>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="categorie">Catégorie de l'objet</label>
                        <select class="form-control" name="categorie" id="categorie" onchange="fetch_select_Categorie(this.value);"></br>
                        <option value="0">Sélectionner une catégorie</option>
                        <?php printSelect($tab); ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="titre">Ajouter un titre à votre annonce *</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" value="" required/>
                        <span class="errors" id="titreerror"></span>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description">Ajouter une description de l'objet (fonctions, caractéristiques)</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description de votre annonce" ></textarea>
                        <span class="errors" id="descriptionerror"></span>
                    </div>
                </div>


                <div class="row">
                    <fieldset class="field-border col-md-12">
                        <legend class="field-border">De belles photos font la différence !</legend>
                    </fieldset>
                </div>

                <div class="input-group">
                    <label class="input-group-btn" for="photo">
                        <span class="btn btn-info"><span class="glyphicon glyphicon-picture"></span>
                        Sélectionner une photo <input type="file" id="photo" name="photo" style="display: none;">
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly="" value="Aucun fichier choisi" />
                </div>

                <p class="lead text-center">
                     <button type="submit" class="btn btn-md btn-success" id="ajout" name="ajout">Enregistrer mon anonce</button>
                </p>
                <span class="errors" id="formerror"></span>

            </form>
        </div>
    </div>
</div>
