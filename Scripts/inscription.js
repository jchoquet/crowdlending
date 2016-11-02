/**
 * Created by mehdi on 01/11/2016.
 */

jQuery(document).ready(function(){

    jQuery("#register").submit(function(){

        if (jQuery("#nom").val() == "") {
            alert("Merci de saisir votre nom");
            jQuery("#nom").focus();
            return false;
        }
        if (jQuery("#prenom").val() == "") {
            alert("Merci de saisir votre prenom");
            jQuery("#prenom").focus();
            return false;
        }
        if (jQuery("#email").val() == "" || valideEmail(jQuery("#email").val()) ) {
            alert("Merci de saisir votre adresse email correcte");
            jQuery("#email").focus();
            return false;
        }
        if (jQuery("#password").val() == "") {
            alert("Merci de saisir votre mot de passe");
            jQuery("#password").focus();
            return false;
        }
        if (jQuery("#vpassword").val() == "") {
            alert("Merci de saisir la vérification de votre mot de passe");
            jQuery("#vpassword").focus();
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


    function valideEmail(Email){
        var filtre = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        var valid = filtre.test(Email);

        if (!valid) {
            return true;
        }
        return false;
    }

});