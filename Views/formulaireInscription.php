<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 01/11/2016
 * Time: 22:38
 */
?>

<div class="container">
    <form role="form" id="register" method="post" action="../Controls/verificationServeur.php">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h1> Inscription <br/> <small> Merci de renseigner vos informations </small></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-3">
                <div class="form-group">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
                </div>
            </div>
            <div class="col-md-offset-1 col-md-3">
                <div class="form-group">
                    <label for="Prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
                </div>
            </div>
        </div>

            <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                    <label for="Email">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="email" placeholder="Nom d'utilisateur" name="username">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                    <label for="Email">Adresse email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-3">
                <div class="form-group">
                    <label for="Password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
                </div>
            </div>
            <div class="col-md-offset-1 col-md-3">
                <div class="form-group">
                    <label for="Vpassword">Vérification mot de passe</label>
                    <input type="password" class="form-control" id="vpassword" placeholder="Vérification mot de passe" name="passwordCheck">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                    <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2  col-md-3">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-phone"> </span>
                    <input type="text" class="form-control" id="tel" placeholder="Numéro de téléphone" name="phone">
                </div>
            </div>
            <div class="col-md-offset-1  col-md-3">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-globe"> </span>
                    <input type="text" class="form-control" id="adresse" placeholder="Adresse" name="address">
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-offset-5  col-md-1">
                    <button type="submit" class="btn btn-primary">S'incrire</button>
                </div>
            </div>
        </div>

</div>
</form>
</div>
