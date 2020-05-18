import Bootstrap from '../../node_modules/bootstrap/js/src/index'


jQuery(function($){


    // When the user scrolls the page, execute myFunction
    $(window).scroll(function() {
        stickyNav()
    });

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function stickyNav() {
        // Get the navbar
        var navbar = document.getElementById("navbar-section");
        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;
        if (window.pageYOffset > sticky) {
            navbar.classList.add("sticky");
            $('#content').css('padding-top', '3rem');
        } else {
            navbar.classList.remove("sticky");
            $('#content').css('padding-top', '0');
        }
    }

    ScrollReveal().reveal('.service-card', { interval: 200 });
    ScrollReveal().reveal('.portfolio-item', { interval: 200 });
    ScrollReveal().reveal('.sub-menu-item', { interval: 200 });
    ScrollReveal().reveal('.process-card', { interval: 200 });
    ScrollReveal().reveal('.footer', {delay: 1000});

    //Cache reference to window and animation items
    var $animation_elements = $('.animate');
    var $window = $(window);
    $window.on('scroll', check_if_in_view);
    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');


    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height) - 200;

        $.each($animation_elements, function() {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);
            var element_bottom_position_alt = (element_top_position + element_height);

            //check to see if this current container is within viewport
            if ( (element_bottom_position_alt >= window_top_position) && (element_top_position <= window_bottom_position) ) {
                if( $element.attr('animate') === 'left' ){
                    console.log('anim left');
                    $element.addClass('anim-left');
                    $element.removeClass('animate');
                } else if( $element.attr('animate') === 'right' ){
                    console.log('anim right');
                    $element.addClass('anim-right');
                    $element.removeClass('animate');
                }else if( $element.attr('animate') === 'up' ){
                    console.log('anim up');
                    $element.addClass('anim anim-up');
                    $element.removeClass('animate');
                }else if( $element.attr('animate') === 'heightBefore' ){
                    console.log('anim height-before');
                    $element.addClass('anim-height-before');
                }else if( $element.attr('animate') === 'objRight' ){
                    console.log('anim obj right');
                    $element.addClass('anim-obj-right');
                }else if( $element.attr('animate') === 'in' ){
                    console.log('anim anim-in');
                    $element.addClass('anim-in');
                    $element.removeClass('animate');
                }else{
                    console.log('anim none');
                    // $element.addClass('anim-in');
                }
            } else {
                // $element.removeAttr('animate');
            }
        });
    }


});