/**
 * Created by Julien on 14/11/2016.
 */

// http://fellowtuts.com/jquery/bootstrap-dynamic-modal-popup-with-dynamic-data-content/

$(document).ready(function () {
    $('#myModal').on('show.bs.modal', function (event) { // id of the modal with event
        var button = $(event.relatedTarget); // Button that triggered the modal

        var link = $('.btn').data('link'); // Extract info from data-* attributes
        /*var nom = $('.btn').data('nom');

        var content = 'Vous allez supprimer l\'objet "' + nom + '". Voulez-vous continuer ?';

        // Update the modal's content.
        var modal = $(this);
        modal.find('.modal-body').text(content);*/


        // on modifie la page lorsque l'utilisateur clique sur le boutton "Supprimer l'objet"
        $('#link-button').click(function () {
            var button = $(this);
            window.location = link;
        });
    });
});

$(document).ready(function () {

    $('.btn').click(function (e) {
        $("#myModal").modal();
        e.stopPropagation();
        $("#messageConfirmation").html(this.getAttribute('data-nom'));
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