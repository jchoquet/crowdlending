/**
 * Created by Julien on 30/11/2016.
 */

$(function(){

    // pop-up "Rendre"
    $('#rendre').click(function (e) {
        $("#newModal").modal();
        e.stopPropagation();
        $("#messageConfirmation").html("Vous allez rendre l'objet '" + this.getAttribute('data-nom') + "'.");

        var link = this.getAttribute('data-link'); // Extract info from data-* attributes

        $('#link-button1').click(function () {
            window.location = link;
        });
    });

    // pop-up "Confirmer recevoir"
    $('#confirmer').click(function (e) {
        $("#myModal").modal();
        e.stopPropagation();
        $("#messageConfirmation").html("Vous allez confirmer recevoir l'objet '" + this.getAttribute('data-nom') + "'.");

        var link = this.getAttribute('data-link'); // Extract info from data-* attributes

        $('#link-button').click(function () {
            window.location = link;
        });
    });



    var hash = window.location.hash;
    var location = window.location.toString();

    hash && $('ul.nav a[href="' + hash + '"]').tab('show'); // permet d'afficher les onglets tout en affichant l'onglet actif dans l'URL

    if (location.indexOf("page_emprunts") != -1) // si la page de l'onglet "Mes emprunts" est modifié, on reste sur cet onglet
    {
        $('ul.nav a[href="' + "#onglet_emprunts" + '"]').tab('show');
    }

    if (location.indexOf("page_prets") != -1) // si la page de l'onglet "Mes prêts" est modifié, on reste sur cet onglet
    {
        $('ul.nav a[href="' + "#onglet_prets" + '"]').tab('show');
    }

    $('#dismiss-button').click(function(){
        $("#myModal").modal('hide');
    });


    $('.nav-tabs a').click(function (e) { // affichage des onglets
        $(this).tab('show');
        var scrollmem = $('body').scrollTop() || $('html').scrollTop();
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
    });
});


// Fermeture du popup si l'utilisateur appuie sur la touche "echap"
$(document).keyup(function (e) {
    if (e.keyCode == 27) $("#myModal").modal('hide');
    e.stopPropagation();
});
