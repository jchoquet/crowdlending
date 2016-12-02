/**
 * Created by Julien on 30/11/2016.
 */

$(function(){
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


    $('.nav-tabs a').click(function (e) { // affichage des onglets
        $(this).tab('show');
        var scrollmem = $('body').scrollTop() || $('html').scrollTop();
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
    });
});
