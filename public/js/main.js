$(document).ready(function() {
    /**
     * Show sign-up modal
     */
    $('.sign-up').click(function () {
       $('.ui.modal').modal('show');
    });

    /**
     * Change checkbox value for gender
     */
    $('.ui.radio.checkbox').checkbox();
});