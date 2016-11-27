<?php
session_start();
if(isset($_GET['searchWord'])){
    include "Views/RechercheObjets.php";
}
else
{
	include "Views/formulaireRecherche.php";
}
?>