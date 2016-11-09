<?php
/**
 * User: mehdi
 * Date: 01/11/2016
 * Time: 22:38
 *
 * Ce fichier contient la vue du formulaire d'inscription sur le site. Utilisation de bootstrap.
 * Les champs du formulaire sont les suivants:
 * - Nom
 * - Prénom
 * - Nom d'utilisateur
 * - Adresse email
 * - Mot de passe
 * - Vérification du mot de passe -> utilisé par le script jQuery et par le serveur pour vérifier le mdp
 * - Téléphone
 * - Adresse postale
 *
 */
?>

<div class="container">
    <form role="form" id="register" method="post" action="../Controls/callVerifServ.php">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h1> Inscription <br/>
                    <small> Merci de renseigner vos informations</small>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8" id="nomPrenom">
                <div class="form-group col-md-4">
                    <label for="Nom">Nom *</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
                </div>
                <div class="form-group col-md-4">
                    <label for="Prenom">Prénom *</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
                </div>
                <div class="form-group col-md-4">
                    <label for="Username">Nom d'utilisateur *</label>
                    <input type="text" class="form-control" id="username" placeholder="Nom d'utilisateur"
                           name="username">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group">
                    <label for="Email">Adresse email *</label>
                    <input type="text" class="form-control" id="email" placeholder="Adresse email" name="email">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-4">
                <div class="row">
                <div class="form-group padding-correct">
                    <label for="Password">Mot de passe *</label>
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe"
                           name="password">
                </div>
            </div>
                <div class="row">
                <div class="form-group padding-correct">
                    <label for="Vpassword">Vérification mot de passe *</label>
                    <input type="password" class="form-control" id="vpassword" placeholder="Vérification mot de passe"
                           name="passwordCheck">
                </div>
                    </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                <div class="form-group padding-correct">
                    <label for="Phone">Téléphone</label>
                    <input type="text" class="form-control" id="tel" placeholder="Numéro de téléphone" name="phone">
                </div>
                    </div>

                <div class="row">
                <div class="form-group padding-correct">
                    <label for="Commune">Commune</label>
                    <input type="text" class="form-control" id="commune" placeholder="Commune" name="commune">
                </div>
                    </div>
            </div>
            <br/>

        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-4">
                <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group">
                    <label for="address">Numéro et nom de rue</label>
                    <input type="text" class="form-control" id="adresse" placeholder="Adresse" name="address">
                </div>
            </div>
        </div>

        <p class="lead">
            <button type="submit" class="btn btn-lg btn-info" id="boutonInscription">S'incrire</button>
        </p>
</div>
</form>
</div>
