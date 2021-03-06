$(document).ready(function() {

    var overlay = $('.sidebar-overlay');

    $('.sidebar-toggle').on('click', function() {
        var sidebar = $('#sidebar');
        sidebar.toggleClass('open');
        if((sidebar.hasClass('sidebar-fixed-left') || sidebar.hasClass('sidebar-fixed-right')) && sidebar.hasClass('open')) {
            overlay.addClass('active');
        } else {
            overlay.removeClass('active');
        }
    });

    overlay.on('click', function() {
        $(this).removeClass('active');
        $('#sidebar').removeClass('open');
    });

});


(function($) {

    var dropdown = $('.sidebar .dropdown');

//	Add slidedown animation to dropdown
    dropdown.on('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

//	Add slideup animation to dropdown
    dropdown.on('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });

})(jQuery);