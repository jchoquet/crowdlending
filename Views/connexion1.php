<!DOCTYPE html >
<html lang="fr">
  <head>
    <meta charset="utf-8"/>

    <link rel="shortcut icon" href="fonts/icone.ico">
    <title></title>

    <!-- pour les moteurs de recherche -->
    <metaname="description" lang="fr" content="" />
    <metaname="keywords" lang="fr" content="" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- jquery -->
	<script src="js/jquery_library.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.js"></script>

	<!-- fichier css perso -->
	<link rel="stylesheet" href="css/connexion.css">

	<!-- fichier JS validation formulaire -->
	<script src="js/validate_co1.js"></script>

</head>
<body>

    <div class="container-fluid">

    <!-- formulaire de connexion -->
			<div id="co" class="col-md-offset-4 col-md-4">
				
				<div class="form-group">
					<label for="identifiantc">Identifiant</label>
    				<input class="form-control" id="identifiantc" name="identifiantc" type="text" value="" required/> 
    				<span class="errors" id="idcerror"></span> 
    			</div>
    			
    			<div class="form-group">
   				 	<label for="mdp">Mot de passe</label>
    				<input class="form-control" id="mdpc" type="password" name="Mot de passe" value="" required/>
    				<span class="errors" id="mdperrorc"></span>
    			</div>
    		
    			<button class="btn btn-default btn-block" type="submit" id="connexion" name="connexion">Se connecter</button>
    			<span class="errors" id="formerror"></span>

			</div>

</div>
</body>
</html>