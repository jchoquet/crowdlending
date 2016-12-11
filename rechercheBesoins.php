<?php
session_start();
if(isset($_GET['searchWord'])){
    include "Views/RechercheBesoins.php";
}
else
{
	include "Views/formulaireRechercheBesoin.php";
}
?>