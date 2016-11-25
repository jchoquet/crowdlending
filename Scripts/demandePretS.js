/**
 * Created by Julien on 25/11/2016.
 */

function accepter(e) {
    $(e).closest('td').find('.espace').html('Demande acceptée');
    $(e).closest('td').find('.btn-danger').remove();
    $(e).remove();
}

function refuser(e) {
    $(e).closest('td').find('.espace').html('Demande refusée');
    $(e).closest('td').find('.btn-success').remove();
    $(e).remove();
}
