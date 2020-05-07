// import './jquery-3.5.1.min.js'
import Bootstrap from '../../node_modules/bootstrap/js/src/index'


// jQuery(function($){
// // mobile menu button handler
//     $('button.navbar-toggler').on('click', function (e) {
//         e.preventDefault(e);
//
//         if ($('.navbar-link-container').hasClass("shown")) {
//             closeMobileNav();
//             $("body").removeClass('modal-open');
//         } else {
//             if ($('#searchformcontainer').hasClass('shown')) {
//                 openMobileNav();
//                 setTimeout(closeMobileSearch, 300);
//             } else {
//                 openMobileNav();
//                 $("body").addClass('modal-open');
//             }
//         }
//     });
//
//     // open mobile nav
//     function openMobileNav(){
//
//         // change display on cont
//         $('button.navbar-toggler').addClass('active');
//         $('.navbar-link-container').css('display', 'flex');
//
//         // show backdrop
//         setTimeout(function(){
//             $('.navbar-link-container').addClass('shown');
//         }, 100);
//
//         // slide in menu
//         setTimeout(function(){
//             $('.navbar-link-container > div').css('left', 0);
//         }, 300);
//
//         // slide in close btn
//         setTimeout(function(){
//             $('.navbar-link-container > .close-mobile-nav').css('top', 0);
//         }, 600);
//     }
//
// // close mobile nav
//     function closeMobileNav(){
//
//         $('button.navbar-toggler').removeClass('active');
//
//         // slide out close btn
//         $('.navbar-link-container > .close-mobile-nav').css('top', '-2.5rem');
//
//         // slide out menu
//         setTimeout(function(){
//             $('.navbar-link-container > div').css('left', '-300px');
//         }, 100);
//
//         // hide backdrop
//         setTimeout(function(){
//             $('.navbar-link-container').removeClass('shown');
//         }, 350);
//
//         // remove containers
//         setTimeout(function() {
//             $('.navbar-link-container').css('display', 'none');
//         }, 500);
//     }
// });