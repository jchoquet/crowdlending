/**
 * Created by Julien on 25/11/2016.
 */

function accepter(e, id_pret) {
    $(e).closest('td').find('.espace').html('Demande acceptée');
    $(e).closest('td').find('.btn-danger').remove();
    $(e).remove();

    $.ajax({ url: 'Models/demandePretM.php',
        data: {action: 'accepter', id_pret: id_pret},
        type: 'post',
        success: function(output) {
            alert(output);
        }
    });
}

function refuser(e) {
    $(e).closest('td').find('.espace').html('Demande refusée');
    $(e).closest('td').find('.btn-success').remove();
    $(e).remove();
}
