/**
 * Created by qianqiuhao on 16/11/12.
 */
$(document).ready(function () {
    $('tr').click(function () {
        descriptionObjet(this.getAttribute("id"));
        nomObjet(this.getAttribute("id"));
        urlPhotoObjet(this.getAttribute("id"));
        $("#myObject").modal(); //Ouverture du modal
        $(this).next().addClass("objNext"); //Ligne suivante dans le tableau des objets
        $(this).prev().addClass("objPrev"); //Ligne précédente dans le tableau des objets
        $('#closeModalObject').click(function (e) {
            $("#myObject").modal('hide');
            e.stopPropagation();
        });
    });
});

//Affiche dans le popup le nom de l'objet
function nomObjet(idObjet) {
    var fun = "nom";
    $.post(urlSite.concat("/Models/popupObjet.php"), {idObjet: idObjet, fun: fun}, function (str) {
        $("#nomObjetPopup").html(str);
    });
}

//Affiche dans le popup la description de l'objet
function urlPhotoObjet(idObjet) {
    $pathImgsObjets = urlSite.concat("/Images/Objets/")
    var fun = "urlPhoto";
    $.post(urlSite.concat("/Models/popupObjet.php"), {idObjet: idObjet, fun: fun}, function (str) {
        $("#photoObjet").attr("src", $pathImgsObjets.concat(str));
    });
}

//Affiche dans le popup la description de l'objet
function descriptionObjet(idObjet) {
    var fun = "description";
    $.post(urlSite.concat("/Models/popupObjet.php"), {idObjet: idObjet, fun: fun}, function (str) {
        $("#descriptionObjet").html(str);
    });
}

//Fermeture du popup si la touche échap est appuyée
$(document).keyup(function (e) {
    if (e.keyCode == 27) $("#myObject").modal('hide');
    e.stopPropagation();
});

//Cas où la flèche de droite est appuyée
$(document).keyup(function (e) {
    if (e.keyCode == 39) {//Code de la flèche droite
        $("#myObject").removeClass("show"); //Fermeture du modal

        if ($(".objNext").length) { //If there is a next object to show
            var tmpNext = $(".objNext"); //Stockage du prochain objet (du prochain tr)
            tmpNext.removeClass("objNext"); //Suppression de la classe "objNext" de ce prochain objet qui va devenir le courant

            //On supprime la classe objPrev pour la ligne précédente
            $(".objPrev").removeClass("objPrev");

            //Simulation du click sur l'objet tmpNext
            tmpNext.trigger("click");
        }
    }
});

//Cas où la flèche de gauche est appuyée
$(document).keyup(function (e) {
    if (e.keyCode == 37) {//Code de la flèche gauche
        $("#myObject").removeClass("show"); //Fermeture du modal

        if ($(".objPrev").length) { // If there is a previous object to show
            var tmpPrev = $(".objPrev"); //Stockage de l'objet précédent (du tr précédent)
            tmpPrev.removeClass("objPrev"); //Suppression de la classe "objPrev" de ce précédent objet qui va devenir le courant

            //On supprime la classe objNext pour la ligne précédente
            $(".objNext").removeClass("objNext");

            //Simulation du click sur l'objet tmpNext
            tmpPrev.trigger("click");
        }
    }
});


