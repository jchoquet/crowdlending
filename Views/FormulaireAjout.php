<?php
/**
 * User: MAHROUS ANOUAR
 * Date: 10/11/2016
 */
?>


<div class="container">

       <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h1><small> Louez vos objets en toute securite... </small></h1>
            </div>
        </div>

        <div class="row">
          <div class="col-md-offset-2 col-md-7">
            <div class="form-group">
              <label for="categorie" > Categorie </label>
                    <br><select name="categorie" id="categorie" onchange="fetch_select_Categorie(this.value);"></br>
                    <option>Selectionner une Categorie</option>
                    </select>
            </div>
           </div>
         </div>
    
        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                    <label for="titre">Le titre de mon annonce* </label>
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="titre" value="" required/>
                    <span class="errors" id="titreerror"></span>
                </div>
            </div>        
            /*<div class="col-md-offset-2 col-md-4">
                <div class="form-group">
                    <label for="prix">Le prix de la location de mon objet pour une journee* </label>
                    <input type="number" class="form-control" id="prix" placeholder="prix" name="prix">

                </div>
            </div>*/
        </div>

        

        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                    <label for="description">Description de mon objet (fonctions, caracteristiques...)* :</label>
                    <textarea class="form-control" id="description" name="description" value="" required></textarea>
                    <span class="errors" id="descriptionerror"></span>
                </div>
            </div>
        </div>

      <p>
      <fieldset class="field-border col-md-offset-2 col-md-7">
        <legend class="field-border">De belles photos font la difference... !</legend>
      </fieldset>
      </p>
      
       
       <div class="row">
        <p><div class="col-md-offset-2 col-md-7">           
          <label for="photo" > Photo </label>
            <button class="btn btn-default btn-file">Parcourir<input type="file" id="photo" name="photo" /></button>
       </div></p>
      </div>

            

        <div class="row">                
            <p><div class="col-md-offset-5  col-md-1">
                <button type="submit" class="btn btn-primary" id="ajout" name="ajout">Enregistrer mon anonce</button>
                <span class="errors" id="formerror"></span>
            </div></p>                   
        </div>

        
</div>
</div>
