<div class="container-fluid">
    <!-- formulaire de connexion -->
    <div id="co" class="col-md-offset-1 col-md-10">
        <h1 id="connexionTitre">Connexion</h1>
        <form role="form" method="post" action="../Controls/ConnexionVerif.php">
            <div class="form-group">
                <label for="identifiant">Identifiant</label>
                <input class="form-control" id="identifiantc" name="username" type="text" value="" required/>
                <span class="errors" id="idcerror"></span>
            </div>

            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input class="form-control" id="mdpc" type="password" name="mdp" value="" required/>
                <span class="errors" id="mdperrorc"></span>
            </div>

            <button class="btn btn-default btn-block" type="submit" id="connexion" name="connexion">Se connecter</button>
            <span class="errors" id="formerror"></span>
    </div>
    </form>
</div>