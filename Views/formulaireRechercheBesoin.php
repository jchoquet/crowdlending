<?php
include __DIR__ . '/../Controls/ListeCategorie.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Lend it - Rechercher</title>
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
    <link rel="stylesheet" href="Styles/formulaireRecherche.css">

</head>
<body>
	<?php include __DIR__ . '/../Views/header.php'; ?>

  <div class="content">
    <div class="wrapper">
      <div class="container" id="container-form">
        <form role="form" id="nearchNeed" method="GET" action="rechercheBesoins.php">

          <div class="row">
  					<fieldset class="field-border col-md-12">
  						<legend class="field-border">Recherche un objet dont quelqu'un a besoin !</legend>
  					</fieldset>
  				</div>

  				<div class="row">
  					<div class="form-group col-md-12">
  							<label for="searchWord">Nom de l'objet : </label>
  							<input type="text" class="form-control" id="searchWord" name="searchWord" placeholder="ex: Tournevis, Poisson Rouge, ..." value="" required/>
  							<span class="errors" id="titreerror"></span>
  					</div>
  				</div>

          </div>


          <p class="lead text-center">
            <button type="submit" class="btn btn-md btn-success" id="ajout" name="ajout">Valider la recherche</button>
          </p>
          <span class="errors" id="formerror"></span>

	      </form>
      </div>
    </div>
  </div>

	<?php include __DIR__ . '/../Views/footer.php'; ?>
</body>

<script type="text/javascript" src="Scripts/config.js"></script>
</html>