jQuery(document).ready(function($) {

    // for image background
    $('.image-background').each(function() {
        var getImageSrc = $(this).find('img').attr('src');
        var getImageErrorSrc = $(this).find('img').attr('onerror');
        if (typeof(getImageErrorSrc) != 'undefined') {
            getImageErrorSrc = getImageErrorSrc.slice(10);
            getImageErrorSrc = getImageErrorSrc.slice(0, -1);
        } else {
            getImageErrorSrc = getImageSrc;
        }
        $(this).css({
            'background-size': 'cover',
            'background-repeat': 'no-repeat',
            'background-position': 'center',
            'background-image': 'url("' + getImageSrc + '")'
        });
        $(this).find('img').on('error', function() {
            $(this).parents('.image-background:first').css({
                'background-image': 'url("' + getImageErrorSrc + '")'
            });
        });
    });


    $("trim-word").text(function(index, currentText) {
        return currentText.substr(0, 205);
    });


});


jQuery(document).ready(function($) {
    $('.slide-wrapper').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
});


jQuery(document).ready(function($) {
    jQuery(".btn--options,.btn--open-search").click(function() {
        jQuery(".mobile-sidebar-option").toggleClass('mobile-sidebar-option--active');
        jQuery(".mobile-sidebar-option__modal").toggleClass('mobile-sidebar-option__modal--active');
        jQuery(".mobile-sidebar-option__sidebar").toggleClass(' mobile-sidebar-option__sidebar--slide');

    });
});

jQuery(document).ready(function($) {
    jQuery(".mobile-sidebar-option__closebox").click(function() {
        jQuery(".mobile-sidebar-option__modal").removeClass('mobile-sidebar-option__modal--active');
        jQuery(".mobile-sidebar-option__sidebar").removeClass('mobile-sidebar-option__sidebar--slide');
    });
});

jQuery(document).ready(function($) {
    jQuery(".mobile-sidebar-option__closebox--icon").click(function() {
        jQuery(".mobile-sidebar-option__modal").removeClass('mobile-sidebar-option__modal--active');
        jQuery(".mobile-sidebar-option__sidebar").removeClass('mobile-sidebar-option__sidebar--slide');
    });
});




jQuery(document).ready(function($) {
    jQuery(".desktop-sidebar-option").click(function() {
        jQuery(this).toggleClass('desktop-sidebar-option--open');
        jQuery(".shirtchamp-blog-detail__left").toggleClass('shirtchamp-blog-detail__left--sidebar-active');
        jQuery(".shirtchamp-blog-detail__right").toggleClass('shirtchamp-blog-detail__right--sidebar-active');
        jQuery(".archive-shirtchamp__left").toggleClass('archive-shirtchamp__left--sidebar-active');
        jQuery(".archive-shirtchamp__right").toggleClass('archive-shirtchamp__right--sidebar-active');
    });
});




// this is for mobile open sub toggle
jQuery(document).ready(function($) {
    jQuery(".btn--option").click(function() {
        jQuery(".header-static__mobile").toggleClass('header-static__mobile--open');
        jQuery(".header-content-block-mobile__right").toggleClass('header-content-block-mobile__right--open');
    });
});