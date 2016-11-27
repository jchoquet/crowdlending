
<?php
include __DIR__ . '/../Controls/ListeCategorie.php';
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
	<?php include __DIR__ . '/../Views/header.php'; ?>
	<form role="form" id="addobject" method="GET" action="../rechercheObjets.php">
		<div class="site-wrapper">
			<div class="site-wrapper-inner">
				<!-- FlÃ¨che retour landing page -->
				<div id="arrow-container">
					<a href="../acceuil.php"><i class="material-icons md-36 md-light">arrow_back</i></a>
				</div>
				<div class="container">
					</br><p>
					<fieldset class="field-border col-md-offset-2 col-md-7">
						<legend class="field-border">Recherche un objet à emprunter !</legend>
					</fieldset>
					</p>
					</br>
					<div class="row">
						<div class="col-md-offset-2 col-md-7">
							<div class="form-group">
								<label for="searchWord">Nom de l'objet : </label>
								<input type="text" class="form-control" id="searchWord" name="searchWord" placeholder="ex: Tournevis, Poisson Rouge, ..." value="" required/>
								<span class="errors" id="titreerror"></span>
							</div>
						</div>
					</div>
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
						</br></br>
						<p><div class="col-md-offset-5  col-md-1">
							<button type="submit" class="btn btn-primary" id="ajout">Valider la recherche</button>
							<span class="errors" id="formerror"></span>
						</div></p>
					</div>
				</div>
			</div>
		</div>
		</div>
	</form>
	<?php include __DIR__ . '/../Views/footer.php'; ?>
</body>

<script type="text/javascript" src="Scripts/config.js"></script>
<script type="text/javascript" src="Scripts/popupObjet.js"></script>

</html>