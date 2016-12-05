/**
 * Created by qianqiuhao on 16/11/26.
 */
$(document).ready(function () {

    $('#demande').click(function (e) {
        $("#myModal").modal();
        e.stopPropagation();
        $("#messageConfirmation").html("Vous allez demander l'objet '" + this.getAttribute('data-nom') + "'.");

        var link = this.getAttribute('data-link'); // Extract info from data-* attributes

        $('#link-button').click(function () {
            window.location = link;
        });
    });

    $('#dismiss-button').click(function(){
        $("#myModal").modal('hide');
    });
});

// Fermeture du popup si l'utilisateur appuie sur la touche "echap"
$(document).keyup(function (e) {
    if (e.keyCode == 27) $("#myModal").modal('hide');
    e.stopPropagation();
});