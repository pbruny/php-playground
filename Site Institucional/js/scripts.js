$(document).ready(function(){
    $('nav.mobile').click(function () {
        var menu = $('nav.mobile ul');

        if (menu.is(':hidden') == true) {
            var icon = $('.mobile-button').find('svg');
            icon.removeClass('fa-bars');
            icon.addClass('fa-times');
            menu.slideToggle();
            
        } else {
            var icon = $('.mobile-button').find('svg');
            icon.removeClass('fa-times');
            icon.addClass('fa-bars');
            menu.slideToggle();
        }
    });
});