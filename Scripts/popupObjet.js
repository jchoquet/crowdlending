/**
 * Created by qianqiuhao on 16/11/12.
 */
$(document).ready(function () {
    $('tr').click(function () {
        descriptionObjet(this.getAttribute("id"));
        nomObjet(this.getAttribute("id"));
        urlPhotoObjet(this.getAttribute("id"));
        $("#myObject").modal();
        $('#closeModalObject').click(function(e){
            $("#myObject").modal('hide');
            e.stopPropagation();
        });
    });
});

//Affiche dans le popup le nom de l'objet
function nomObjet(idObjet)
{
    var fun = "nom";
    $. post(urlSite.concat("/Models/popupObjet.php"), {idObjet : idObjet, fun: fun}, function (str) {
        $("#nomObjetPopup").html(str);
    });
}

//Affiche dans le popup la description de l'objet
function urlPhotoObjet(idObjet)
{
    $pathImgsObjets = urlSite.concat("/Images/Objets/")
    var fun = "urlPhoto";
    $. post(urlSite.concat("/Models/popupObjet.php"), {idObjet : idObjet, fun: fun}, function (str) {
        $("#photoObjet").attr("src", $pathImgsObjets.concat(str));
    });
}

//Affiche dans le popup la description de l'objet
function descriptionObjet(idObjet)
{
    var fun = "description";
    $. post(urlSite.concat("/Models/popupObjet.php"), {idObjet : idObjet, fun: fun}, function (str) {
        $("#descriptionObjet").html(str);
    });
}

//Fermeture du popup si la touche échap est appuyée
$(document).keyup(function(e){
    if (e.keyCode == 27) $("#myObject").modal('hide');
    e.stopPropagation();
});

