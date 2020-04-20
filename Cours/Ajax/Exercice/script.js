// Pour s'assurer que jQuery est bien chargé
$(function () {

    $('#ticket-form').submit(function () {

        // $.post
        $.ajax({
            url: 'envoi_ticket.php', // $(this).attr('action')
            method: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (result) {
                console.log(result);
                $('#ajax-msg').html(result.msg);
                if (result.status == 'success') {
                    $('#ajax-msg').removeClass('alert-danger');
                    $('#ajax-msg').addClass('alert-success');
                } else {
                    $('#ajax-msg').removeClass('alert-success');
                    $('#ajax-msg').addClass('alert-danger');
                }
            },
            error: function () {

            }
        });

        return false; // Empeche le navigateur d'envoyer le formulaire
    });
});

// VANILLA
document.getElementById('ticket-form').onsubmit = function () {
    let name = document.getElementById('name');
    let description = document.getElementById('description');
    let priority = document.getElementById('priority');
    //console.log('Form envoyé');
    let xhr = new XMLHttpRequest;
    xhr.open('POST', 'envoi_ticket.php');
    xhr.onload = function () {
        let result = JSON.parse(this.responseText);
        console.log(result);
    };
    let param = "?name=" + name.val + "&description=" + description.val + "&priority=" + priority.val;
    xhr.send(param);

    return false;
};