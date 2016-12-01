$(document).ready(function(){

    $(document).on('change', ':file', function() {
        var input = $(this);
        if (input.val())
        {
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        }
        else
        {
            label = "Aucun fichier choisi";
        }
        input.trigger('fileselect', label);
    });

    $(':file').on('fileselect', function (event, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        input.val(log);
    });

    /* variables profil */

    var nom = "";
    var prenom = "";
    var adresse = "";
    var username = "";
    var email = "";
    var omdp = "";
    var nmdp = "";
    var cnmdp = "";


    $("#nom").keyup(function() {

        var tmp = $(this).val();

        if(tmp == "" || (tmp.length > 50))
        {
            $("#nomerror").html("La taille maximale est de 50 caractères");
            nom = "";
        }
        else
        {
            $("#nomerror").html("");
            nom = tmp;
        }
    });

    $("#prenom").keyup(function() {

        var tmp = $(this).val();

        if(tmp == "" || (tmp.length > 50))
        {
            $("#prenomerror").html("La taille maximale est de 50 caractères");
            prenom = "";
        }
        else
        {
            $("#prenomerror").html("");
            prenom = tmp;
        }
    });

/*    $("#adresse").keyup(function() {

        var tmp = $(this).val();

            $("#adresseerror").html("");
            adresse = tmp;
    });*/

    $("#username").keyup(function() {

        var tmp = $(this).val();

        if(userNameExisted)
        {
            $("#usernameerror").html("Le nom d'utilisateur que vous avez choisi est déjà attribué, veuillez en choisir un autre");
            username = "";
        }
        else
        {
            $("#usernameerror").html("");
            username = tmp;
        }
    });


    $("#omdp").keyup(function() {

        var tmp = $(this).val();

        if(tmp == "")
        {
            $("#oldMdperror").html("erreur mdp");
            omdp = "";
        }
        else
        {
            $("#oldMdperror").html("");
            $.ajax({

                type:'POST',
                url:'../Controls/verificationProfil.php',
                data:"oldmdp="+tmp,
                success:function(msg){

                    if(msg == "OK")
                    {
                        $("#oldMdperror").html("");
                        omdp = tmp;
                    }
                    else
                    {
                        $("#oldMdperror").html(msg);
                        omdp = "";
                    }
                }
            });
        }
    });

    $("#nmdp").keyup(function() {

        var tmp = $(this).val();

        if(tmp == "" )
        {
            $("#newMdperror").html("erreur mdp");
            nmdp = "";
        }
        else
        {
            $("#newMdperror").html("");
            nmdp = tmp;
        }
    });

    $("#mdpc").keyup(function() {

        var tmp = $(this).val();

        /* test vide */
        if(tmp == "" || (nmdp !== tmp))
        {
            $("#cnewMdperror").html("Mots de passe différents");
            cnmdp = "";
        }
        else
        {
            $("#cnewMdperror").html("");
            cnmdp = tmp;
        }
    });

    $("#email").keyup(function() {

        var tmp = $(this).val();

        /* test vide */
        if(valideEmail(jQuery("#email").val()))
        {
            $("#emailerror").html("L'adresse email entrée est invalide");
            email = "";
        }
        else
        {
            $("#emailerror").html("");
            email = tmp;
        }
    });


    $("#modifProf").click(function() {

        if( nom == "" )
        {
            $("#formerror").html("");
        }
        if( prenom == "" )
        {
            $("#formerror").html("");
        }
        if( email == "" || omdp == "" || nmdp == "" || cnmdp == "")
        {
            $("#formerror").html("");
        }
        else{
            $("#formerror").html("");
            $.ajax({
                type:'POST',
                url:'../Controls/verificationProfil.php',
                data:"nom="+nom+"&prenom="+prenom+"&email="+email+"&oldmdp="+omdp+"&nmdp="+nmdp+"&username="+username,
                success:function(msg)
                {
                    if(msg == "OK"){
                        window.location.replace("../Views/monCompte.php");
                    }
                    else{

                        $("#formerror").html(msg);
                    }
                }
            });
        }
    });

    function valideEmail(Email) {
        var filtre = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        var valid = filtre.test(Email);

        if (!valid)
            return true;
        return false;
    }

    function userNameNotExist() {
        var username = $("#username").val();
        $. post(urlSite.concat("../Controls/nameVerify.php"), {username : username}, function (str) {
            if (str == '0'){
                $("#usernameerror").html("<p style=\"color:red;\">Le nom d'utilisateur est déjà attribué</p>");
                userNameExisted = true;
            }
            else {
                $("#usernameerror").html("<p style=\"color:red;\"></p>");
                userNameExisted = false;
            }
        });
    }

});
