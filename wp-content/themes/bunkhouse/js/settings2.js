/**
 * Created by circdominic on 4/14/16.
 */
(function($) {
    "use strict";

    $(document).ready(function() {

        // ====================================================================

        // Header scroll function

        // Superslides

        //=====================================================================

        // Owl Carousels


        $("#blog .owl-carousel").owlCarousel({
            items: 2,
            loop:true,
            responsiveClass:true,
            margin: 60,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
            responsive:{
                0:{
                    items:1
                },
                767:{
                    items:2
                }
            }
        });


        //=====================================================================

    })

})(jQuery);