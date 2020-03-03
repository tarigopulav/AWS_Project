(function($) {
    "use strict";
    jQuery(document).ready(function () {

        var langIcon = $('.header_top_area .language_option'),
        lang = $('.header_top_area .lang');

        langIcon.on('click', function(){
            lang.toggleClass('clicked');
        });
        $('.header_top_area .lang li').on('click', function(){
            lang.removeClass('clicked');
        });
        $('.header_top_area .lang').on('mouseleave', function(){
            lang.removeClass('clicked');
        });

        $('.header').on('click', '.search-toggle', function(e) {
            var selector = $(this).data('selector');
            $(selector).toggleClass('show').find('.search-input').focus();
            $(this).toggleClass('active');
            e.preventDefault();
        });       
        //this code is for hero slider
        if( $.fn.camera ){
            jQuery('#camera_wrap_4').camera({
                height: '700px',
                loader: false,
                pagination: false,
                thumbnails: true,
                hover: false,
                opacityOnGrid: false,
                overlayer: true,
                navigation: true,
                navigationHover: true,
            }); 
        }
        
        //meanmenu
        jQuery('header nav').meanmenu();
        //This code is for owl Carousel
        if( $.fn.owlCarousel ){
            //This code is for client_crsl_two
            $('.client_crsl_two').owlCarousel({
                nav:true,
                dots:false,
                autoplay:false,
                loop:true,
                margin:30,
                smartSpeed:1000,
                navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
                responsiveClass:true,
                responsive:{
                    300:{
                        items:1,

                    },
                      480:{
                        items:1,

                    },
                    768:{
                        items:2,


                    },
                      1170:{
                        items:3,

                    },

                }
            });

            //This code is for  Team_crsl

            $('.team_slider').owlCarousel({
                nav:true,
                dots:false,
                autoplay:false,
                loop:true,
                margin:30,
                smartSpeed:1000,
                navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],

                responsiveClass:true,
                responsive:{
                    300:{
                        items:1,

                    },
                      480:{
                        items:1,

                    },
                    768:{
                        items:3,


                    },
                      1170:{
                        items:4,

                    },

                }
            });   
        //This code is for client_crsl
            $('.client_crsl').owlCarousel({
                items:1,
                nav:true,
                autoplay:true,
                loop:true,
                dots:false,
                margin:30,
                smartSpeed:1000,
                navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
            });
        }
    //This code is for singlePrice Hover effect

        $('.single_table').hover(function(){
            $('.single_table').removeClass('active');
            $(this).addClass('active');
        });  
        
    }); 
 })(jQuery);
