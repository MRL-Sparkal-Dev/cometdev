(function ($) {
    $(document).ready(function () {
        // Logout Feature
        $(document).on('click','#logout_btn', function (e) {
            e.preventDefault();
            $('#logout_form').submit();
        });
    });
})(jQuery)
