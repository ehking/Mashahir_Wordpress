jQuery(document).ready(function(event) {

    jQuery('#fupForm').submit(ajaxSubmit);

    function ajaxSubmit() {
        var fupForm = jQuery(this).serialize();
        jQuery.ajax({
            action:  'makeBooking',
            type:    "POST",
            url:     MBAjax.admin_url,
            data:    fupForm,
            success: function(data) {
               alert(data);
            }
        });
        alert(fupForm);
    }
});