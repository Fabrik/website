/**
 * Created by rob on 10/01/2016.
 */
(function ($) {

    $(document).ready(function ($) {
        $('.fabrikDataContainer tr .hover-menu').hide();

        $('.fabrikDataContainer tr').on('mouseover', function () {
            $('.fabrikDataContainer tr .hover-menu').hide();
            $(this).find('.hover-menu').show();
        });

        $('.fabrikDataContainer tr').on('mouseleave', function () {
            $(this).find('.hover-menu').hide();
        });
    });
})(jQuery);