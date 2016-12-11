/**
 * Created by qianqiuhao on 16/12/10.
 */
$(document).ready(function ()
{
    $('#besoinModal').on('show.bs.modal', function (event)
    { // id of the modal with event
        var button = $(event.relatedTarget); // Button that triggered the modal

        var link = button.data('link'); // Extract info from data-* attributes
        var nom = button.data('nom');

        var content = 'Vous allez supprimer le besoin "' + nom + '". Voulez-vous continuer ?';

        // Update the modal's content.
        var modal = $(this);
        modal.find('.modal-body').text(content);


        // on modifie la page lorsque l'utilisateur clique sur le boutton "Supprimer le besoin"
        $('#link-button').click(function()
        {
            var button = $(this);
            window.location = link;
        });
    });
});


// Fermeture du popup si l'utilisateur appuie sur la touche "echap"
$(document).keyup(function(e)
{
    if (e.keyCode == 27) $("#dismiss-button").click();
});