/**
 * Created by mehdi on 01/11/2016.
 */

jQuery(document).ready(function () {

    jQuery("#register").submit(function () {

        if (jQuery("#nom").val() == "") {
            $("#problemName").html("Veuillez remplir le champ 'Nom'");
            $("#pbInscription").modal();
            $("#pbInscription").focus();
            $('#pbInscription').on('hidden.bs.modal', function () {
                jQuery("#nom").focus();
            })
            return false;
        }
        if (jQuery("#prenom").val() == "") {
            $("#problemName").html("Veuillez remplir le champ 'Prénom'");
            $("#pbInscription").modal();
            $('#pbInscription').on('hidden.bs.modal', function () {
                jQuery("#prenom").focus();
            })
            return false;
        }
        if (jQuery("#username").val() == "") {
            $("#problemName").html("Veuillez remplir le champ 'Nom d'utilisateur'");
            $("#pbInscription").modal();
            $('#pbInscription').on('hidden.bs.modal', function () {
                jQuery("#username").focus();
            })
            return false;
        }
        if (!userNameNotTooLong()) {
            $("#problemName").html("Le nom d'utilisateur choisi est trop long");
            $("#pbInscription").modal();
            $('#pbInscription').on('hidden.bs.modal', function () {
                jQuery("#username").focus();
            })
            return false;
        }

        //Check if the user name is not already taken
        if(!userNameNotExist()){
            $("#problemName").html("Le nom d'utilisateur que vous avez choisi est déjà attribué, veuillez en choisir un autre");
            $("#pbInscription").modal();
            $('#pbInscription').on('hidden.bs.modal', function () {
                jQuery("#username").focus();
            })
            return false;
        }

        if (jQuery("#email").val() == "" || valideEmail(jQuery("#email").val())) {
            $("#problemName").html("L'adresse email entrée est invalide");
            $("#pbInscription").modal();
            $('#pbInscription').on('hidden.bs.modal', function () {
                jQuery("#email").focus();
            })
            return false;
        }
        if (jQuery("#password").val() == "") {
            $("#problemName").html("Veuillez remplir le champ 'Mot de passe'");
            $("#pbInscription").modal();
            $('#pbInscription').on('hidden.bs.modal', function () {
                jQuery("#password").focus();
            })
            return false;
        }
        if (jQuery("#vpassword").val() == "") {
            $("#problemName").html("Veuillez remplir le champ 'Vérification mot de passe'");
            $("#pbInscription").modal();
            $('#pbInscription').on('hidden.bs.modal', function () {
                jQuery("#vpassword").focus();
            })
            return false;
        }


    });


    $("#vpassword").keyup(checkPasswordMatch);
    $("#password").keyup(checkPasswordMatch);

    function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#vpassword").val();

        if (password != confirmPassword && confirmPassword != "")
            $("#divCheckPasswordMatch").html("<p style=\"color:red;\">Mots de passe différents</p>");
        else
            $("#divCheckPasswordMatch").html("");
    }


    function valideEmail(Email) {
        var filtre = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        var valid = filtre.test(Email);

        if (!valid)
            return true;
        return false;
    }


    /* If userName is lower than 50 caracter, return true.
     * else return false*/
    function userNameNotTooLong() {
        var name = $('#username').val();
        if (name.length >= 50) {
            return false;
        }
        else {
            return true;
        }
    }


    /* If userName not existed, return true.
     * else return false. */
    function userNameNotExist() {
        var username = $("#username").val();
        var changeUrl = "../Controls/nameVerify.php?action=check&username=" + username;
        $.get(changeUrl, function (str) {
            if (str == '1') {
                return true;
            }
            else {
                return false;
            }
        });
    }

});

//Fermeture du popup indiquant les problèmes si pression de la touche escape
$(document).keyup(function(e){
    if (e.keyCode == 27) $("#closePbInscription").click();
});