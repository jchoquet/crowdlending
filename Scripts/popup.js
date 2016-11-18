/**
 * Created by qianqiuhao on 16/11/12.
 */
jQuery(document).ready(function () {
    $("#nomObjet,#photoObjet").click(function () {
        $("#myObject").modal();
    });
});

descriptionObjet();
nomObjet();
urlPhotoObjet();

//Affiche dans le popup le nom de l'objet
function nomObjet()
{
    var idObjet = 1;
    var fun = "nom";
    $. post(urlSite.concat("/Models/popupObjet.php"), {idObjet : idObjet, fun: fun}, function (str) {
        $("#nomObjetPopup").html(str);
    });
}

//Affiche dans le popup la description de l'objet
function urlPhotoObjet()
{
    var idObjet = 1;
    var fun = "urlPhoto";
    $. post(urlSite.concat("/Models/popupObjet.php"), {idObjet : idObjet, fun: fun}, function (str) {
        $("#photoObjet").attr("src",str);
        $("#photoObjetBigger").attr("src",str);
    });
}

//Affiche dans le popup la description de l'objet
function descriptionObjet()
{
    var idObjet = 1;
    var fun = "description";
    $. post(urlSite.concat("/Models/popupObjet.php"), {idObjet : idObjet, fun: fun}, function (str) {
        $("#descriptionObjet").html(str);
    });
}

//Fermeture du popup si la touche échap est appuyée
$(document).keyup(function(e){
    if (e.keyCode == 27) $("#closePopup").click();
});