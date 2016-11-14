<div class="site-wrapper">
    <div class="site-wrapper-inner">

    <!-- Fleche retour landing page -->
    <div id="arrow-container">
        <a href="../index.php"><i class="material-icons md-36 md-light">arrow_back</i></a>
    </div>

    <div class="container">
       <!-- formulaire de connexion -->
       <form id="co" role="form" method="post" action="../Controls/ConnexionVerif.php">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="identifiant">Identifiant</label>
                            <input class="form-control" id="identifiantc" name="username" type="text" value="" required/>
                            <span class="errors" id="idcerror"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input class="form-control" id="mdpc" type="password" name="mdp" value="" required/>
                        <span class="errors" id="mdperrorc"></span>
                    </div>
                </div>
            </div>

            <p class="lead">
                <button class="btn btn-lg btn-info" type="submit" id="connexion" name="connexion">Se connecter</button>
            </p>
            <span class="errors" id="formerror"></span>
       </form>
     </div>
</div>
