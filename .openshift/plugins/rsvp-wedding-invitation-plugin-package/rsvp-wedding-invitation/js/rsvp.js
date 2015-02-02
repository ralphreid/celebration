 jQuery(document).ready(function () {
     $ = jQuery;
     $('#rsvp_no').change(function () {
         if ($(this).attr('checked')) {
            $('#totals').hide();
         }
     });
     $('#rsvp_yes').change(function () {
         if ($(this).attr('checked')) {
            $('#totals').show();
         }
     });
     $('#rsvp_yes').trigger('change');
     $('#rsvp_no').trigger('change');
 });
