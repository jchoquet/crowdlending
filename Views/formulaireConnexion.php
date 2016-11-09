<div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="container">
      <!-- formulaire de connexion -->
        <!-- <div id="co" class="col-md-offset-4 col-md-4"> -->
          <form id="co" role="form" method="post" action="../Controls/scriptc1.php">
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
              <span class="errors" id="formerror"></span>
            </p>

          </form>
        <!-- </div> -->
    </div>
  </div>
</div>