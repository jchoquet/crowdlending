/**
 * Created by Julien on 14/11/2016.
 */

// http://fellowtuts.com/jquery/bootstrap-dynamic-modal-popup-with-dynamic-data-content/

$(document).ready(function ()
{
    $('#myModal').on('show.bs.modal', function (event)
    { // id of the modal with event
        var button = $(event.relatedTarget); // Button that triggered the modal

        var link = button.data('link'); // Extract info from data-* attributes
        var nom = button.data('nom');

        var content = 'Vous allez supprimer l\'objet "' + nom + '". Voulez-vous continuer ?';

        // Update the modal's content.
        var modal = $(this);
        modal.find('.modal-body').text(content);


        // on modifie la page lorsque l'utilisateur clique sur le boutton "Supprimer l'objet"
        $('#link-button').click(function()
        {
            var button = $(this);
            window.location = link;
        });
    });


/*
    $('#modifObj').on('show.bs.modal', function (event)
    { // id of the modal with event
        var button = $(event.relatedTarget); // Button that triggered the modal

        var iid = button.data('nom');
        var mess = "lol";

        $.ajax({
            type:'POST',
            url:'../Models/mesObjetsGet.php',
            data:"iid="+iid,
            success:function(array) {
                var modal = $(this);

                if(array["nom"] != "" && array["photo"] != "" && array["description"] != ""){
                    mess = 'nsm';
                }
                else{
                    mess = "oklm dans les bois";
                }
                modal.find('.modal-footer').text(mess);
            }
        });


        // Update the modal's content.



        // on modifie la page lorsque l'utilisateur clique sur le boutton "Supprimer l'objet"
        $('#link-button').click(function()
        {
            var button = $(this);
            window.location = link;
        });
    });
*/


});


// Fermeture du popup si l'utilisateur appuie sur la touche "echap"
$(document).keyup(function(e)
{
    if (e.keyCode == 27) $("#dismiss-button").click();
});