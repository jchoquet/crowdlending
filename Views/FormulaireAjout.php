<?php
/**
 * User: MAHROUS ANOUAR
 * Date: 10/11/2016
 */
include __DIR__ . '/../Controls/ListeCategorie.php';
include __DIR__ . '/../Views/header.php';
?>


<form role="form" id="addobject" method="post" action="../Controls/verificationObject.php">
<div class="site-wrapper">
    <div class="site-wrapper-inner">

        <!-- Flèche retour landing page -->
        <div id="arrow-container">
            <a href="../acceuil.php"><i class="material-icons md-36 md-light">arrow_back</i></a>
        </div>

            <div class="container">

                </br><p>
                <fieldset class="field-border col-md-offset-2 col-md-7">
                    <legend class="field-border">Prêtez vos objets en toute sécurité !</legend>
                </fieldset>
                </p>

                </br>

                    <div class="row">
                      <div class="col-md-offset-2 col-md-7">
                        <div class="form-group">
                          <label for="categorie" > Catégorie </label>
                                <br><select name="categorie" id="categorie" onchange="fetch_select_Categorie(this.value);"></br>
                                <option>Selectionner une catégorie</option>
                                <?php printSelect($tab); ?>
                            </select>
                        </div>
                       </div>
                     </div>

                    <div class="row">
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="titre">Le titre de mon annonce* </label>
                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" value="" required/>
                                <span class="errors" id="titreerror"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="description">Description de mon objet (fonctions, caractéristiques) :</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description de votre annonce" ></textarea>
                                <span class="errors" id="descriptionerror"></span>
                            </div>
                        </div>
                    </div>

                  <p>
                  <fieldset class="field-border col-md-offset-2 col-md-7">
                    <legend class="field-border">De belles photos font la différence !</legend>
                  </fieldset>
                  </p>
                </br></br>

                   <div class="row">
                    <p><div class="col-md-offset-2 col-md-7">
                      <label for="photo" > Photo </label>
                           <span class="btn btn-default btn-file"><input type="file" id="photo" name="photo" />
                   </div></p>
                  </div>


                    <div class="row">
                        </br></br>
                        <p><div class="col-md-offset-5  col-md-1">
                            <button type="submit" class="btn btn-primary" id="ajout" name="ajout">Enregistrer mon anonce</button>
                            <span class="errors" id="formerror"></span>
                        </div></p>
                    </div>


            </div>
            </div>
</div>
</div>
</form>
<?php include __DIR__ . '/../Views/header.php'; ?>


