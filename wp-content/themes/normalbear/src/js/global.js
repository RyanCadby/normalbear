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
            console.log(window.pageYOffset);
            navbar.classList.add("sticky");
            $('#content').css('padding-top', '3rem');
        } else {
            navbar.classList.remove("sticky");
            $('#content').css('padding-top', '0');
        }
    }
});