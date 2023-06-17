$(document).ready(function() {
    $('.add-to-library').click(function() {
        $(this).attr('disabled', 'disabled'); // Disable the button after clicking
        $(this).closest('.library-form').submit(); // Submit the form
    });
});