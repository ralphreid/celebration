jQuery(document).ready(function($) {
    setTimeout(function() {
        $(".fade").fadeOut("slow", function() {
            $(".fade").remove();
        });
    }, 2000);
    $('#cb').click(function() {
        if ($(this).attr('checked') === 'checked') {
            $(':checkbox').attr('checked', 'checked');
        } else {
            $(':checkbox').removeAttr('checked');
        }
    });
    $('#doaction').click(function() {
        bulk_action = $('#bulk_action').val();
        if (bulk_action === 'delete') {
            $('#bulk_action_form').attr('action', $('#bulk_delete_action').val());
            $('#bulk_action_form').submit();
        } else {
            if (bulk_action === 'invite') {
                $('#bulk_action_form').attr('action', $('#bulk_invite_action').val());
                $('#bulk_action_form').submit();
            } else {
                return false;
            }
        }
    });
    $('#send').click(function() {
        $('#vw_rsvp_send_invites').attr('action', $('#send_invite_url').val());
        return true;
    });
});
function emailValidation(status)
{
    $ = jQuery;

    var data = {
        action: 'email_validation',
        status: status
    };

    $.post(ajaxurl, data, function(response) {
        if (response === 'Y') {
            $('#validation').html("&nbsp;&nbsp;&nbsp;&nbsp;RSVP Form Email validation is <strong>ENABLED</strong>! <a href=\"#\" onclick=\"emailValidation('N');return false;\">Click to disable</a>");
        } else {
            $('#validation').html("&nbsp;&nbsp;&nbsp;&nbsp;RSVP Form Email validation is <strong>DISABLED</strong>! <a href=\"#\" onclick=\"emailValidation('Y');return false;\">Click to enable</a>");
        }
    });
}