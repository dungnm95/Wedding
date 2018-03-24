jQuery(document).ready(function($) {
    $('.icon-search').click(function () {
        $('.header-menu-item-icon').fadeOut(500).promise().done(function () {
            $('.search-form').fadeIn(500);
        });
    });
    $('.close-icon').click(function () {
        $('.search-form').fadeOut(500).promise().done(function () {
            $('.header-menu-item-icon').fadeIn(500);
        });
    });
});


