<?php
if (!isset($_POST['username']))
    header("Location: Views/connexion.php")
?>


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Lend it !</span>
        </div>

        <div class="collapse navbar-collapse" id="menu-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="acceuil.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-search"></span> Rechercher un objet</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Faire une demande</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-plus"></span> Ajouter un objet</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]; ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Mon compte</a></li>
                        <li><a href="mesObjets.php">Mes objets</a></li>
                        <li><a href="#">Mon historique</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="Controls/deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>