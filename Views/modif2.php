<?php
include __DIR__ . '/../Models/connexion.php';


$a = session_id();
if(empty($a)) session_start();


function getnom($idObjet)
{
    global $DB;
    $req = $DB->prepare("SELECT nom FROM objet WHERE id = :idObjet");
    $req->bindValue(':idObjet', $idObjet);
    $req->execute();
    $row = $req->fetch();
    echo $row['nom'];
}

function getphoto($idObjet)
{
    global $DB;
    $req = $DB->prepare("SELECT path_photo FROM objet WHERE id = :idObjet");
    $req->bindValue(':idObjet', $idObjet);
    $req->execute();
    $row = $req->fetch();
    echo $row['path_photo'];
}

function getdescription($idObjet)
{
    global $DB;
    $req = $DB->prepare("SELECT description FROM objet WHERE id = :idObjet");
    $req->bindValue(':idObjet', $idObjet);
    $req->execute();
    $row = $req->fetch();
    echo $row['description'];
}



?>

<!doctype html>

<html lang="fr">
<head>
    <meta charset="utf-8">

    <title> Modifier votre objet </title>
    <link rel="stylesheet" href="../Styles/bootstrap.css"/>
    <link rel="stylesheet" href="../Styles/ajout.css">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->

    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../Scripts/jquery_library.js"></script>
    <script src="../Scripts/bootstrap.js"></script>

</head>

<body>

</body>
</html>
