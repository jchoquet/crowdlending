/**
 * Created by mehdi on 01/11/2016.
 */

jQuery(document).ready(function()
{

    jQuery("#register").submit(function()
    {

        if (jQuery("#nom").val() == "")
        {
            alert("Merci de saisir votre nom");
            jQuery("#nom").focus();
            return false;
        }
        if (jQuery("#prenom").val() == "")
        {
            alert("Merci de saisir votre prenom");
            jQuery("#prenom").focus();
            return false;
        }
        if (jQuery("#username").val() == "")
        {
            alert("Merci de saisir un nom d'utilisateur");
            jQuery("#username").focus();
            return false;
        }
        if(!userNameNotTooLong())
        {
            alert("Votre nom est trop long, il doit faire moins de 50 caractères de long");
            jQuery("#username").focus();
            return false;
        }

        //Check if the user name is not already taken
        userNameNotExist();

        if (jQuery("#email").val() == "" || valideEmail(jQuery("#email").val()) )
        {
            alert("Merci de saisir votre adresse email correcte");
            jQuery("#email").focus();
            return false;
        }
        if (jQuery("#password").val() == "")
        {
            alert("Merci de saisir votre mot de passe");
            jQuery("#password").focus();
            return false;
        }
        if (jQuery("#vpassword").val() == "")
        {
            alert("Merci de saisir la vérification de votre mot de passe");
            jQuery("#vpassword").focus();
            return false;
        }


    });
    $("#vpassword").keyup(checkPasswordMatch);
    $("#password").keyup(checkPasswordMatch);

    function checkPasswordMatch()
    {
        var password = $("#password").val();
        var confirmPassword = $("#vpassword").val();

        if (password != confirmPassword && confirmPassword != "")
            $("#divCheckPasswordMatch").html("<p style=\"color:red;\">Mots de passe différents</p>");
        else
            $("#divCheckPasswordMatch").html("");
    }


    function valideEmail(Email)
    {
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
        if(name.length >= 50)
        {
            return false;
        }
        else {
            return true;
        }
    }


    /* If userName not existed, return true.
     * else return false. */
    function userNameNotExist() {
        var name = $("#username").val();
        var changeUrl = "nameVerify.php?action=check&name="+name;
        $.get(changeUrl,function(str){
            if(str == '1') {
                return true;
            }
            else{
                alert("Le nom d'utilisateur existe déjà");
                jQuery("#username").focus();
                return false;
            }
        })
    }

});