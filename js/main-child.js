jQuery(document).ready(function ($) {
    
    'use strict';
    
    // Toggle sur l'ouverture du menu burger
    $(".burger").click(function () {
        $("body").toggleClass("menu-expanded");
//        $(".menu-helper").toggleClass("visible");
		$(".burger label").text(function(i, v){
		   return v === 'Menu' ? 'Fermer' : 'Menu'
		});

        // Chaque élément du menu s'affiche avec une transition différée
        var delay = 0;
        $('.menu-burger-menu-container').each(function () {
            var $li = $(this);

            setTimeout(function () {
                $li.toggleClass('transition-open');
            }, delay += 100); // delay 100 ms
        });
        
    });
    
    
    // Pop over à l'ouverture du searchform
    $(".search-form-btn").click(function () {
        $(".overlay.search-form").addClass("open");
        $("body").addClass("overlay-expanded");
    });
    $(".overlay .close").click(function () {
        $(".overlay.search-form").removeClass("open");
        $("body").removeClass("overlay-expanded");

    });
    
    // Pop over à l'ouverture de location
    $(".location-btn").click(function () {
        $(".overlay.location").addClass("open");
        $("body").addClass("overlay-expanded");
    });
    $(".overlay .close").click(function () {
        $(".overlay.location").removeClass("open");
        $("body").removeClass("overlay-expanded");

    });
    // Pop over à l'ouverture de l'annuaire
    $(".annuaire-btn").click(function () {
        $(".overlay.annuaire").addClass("open");
        $("body").addClass("no-scroll");
    });
    $(".overlay .close").click(function () {
        $(".overlay.annuaire").removeClass("open");
        $("body").removeClass("no-scroll");

    });   
    // Pop over à l'ouverture du calendrier
    $(".calendar-btn").click(function () {
        $(".overlay.calendar").addClass("open");
        $("body").addClass("no-scroll");
    });
    $(".overlay .close").click(function () {
        $(".overlay.calendar").removeClass("open");
        $("body").removeClass("no-scroll");

    });  
    
    
    // Toggle dépliage Sommaire
    $(".bobinette").click(function () {
        $("#stickyMenu").toggleClass("open");
    });
    // reading time
    $(function() {

        $('article').each(function() {

            let _this = $(this);

            _this.readingTime({
                readingTimeTarget: '.eta',
                remoteTarget: 'article',
                success: function(data) {
                }
            });
        });
    });
    
    // Permettre au slider menu de fonctionner avec le scroll
//    const slider = $("#burger-menu");
//
//    slider.on('wheel', (function(e) {
//      e.preventDefault();
//
//      if (e.originalEvent.deltaY < 0) {
//        $(this).slick('slickNext');
//      } else {
//        $(this).slick('slickPrev');
//      }
//    }));
    
//    var slideCount = jQuery("#burger-menu").length;
//    if (slideCount <= 1.7) {
//      // clone element
//      jQuery("#burger-menu.slider").children().clone(true, true).appendTo("#burger-menu.slider");
//    }
    // Initialisation du carousel pour le menu
    if (window.matchMedia("(min-width: 767px)").matches) {
//        $('#burger-menu').slick({
//          infinite: true,
//          centerMode: true,
//          centerPadding: '40px',
//          slidesToShow: 1.7,
//          dots: true,
//          prevArrow: false,
//          nextArrow: false,
//          mobileFirst: true,
//          responsive: [
//            {
//              breakpoint: 1200,
//              settings: {
//                slidesToShow: 1.7,
//                centerPadding: '40px',
//              }
//            },
//            {
//              breakpoint: 1100,
//              settings: {
//                slidesToShow: 1,
//                centerPadding: '20px',
//              }
//            },
//            {
//              breakpoint: 100,
//              settings: {
//                arrows: false,
//                centerMode: true,
//                centerPadding: '10px',
//                slidesToShow: 1
//              }
//            }
//          ]
//        });
    }else{
        $('.overlay.location .wrapper').slick({
            infinite: true,
            centerMode: true,
            centerPadding: '20px',
            slidesToShow: 1,
            dots: true,
            prevArrow: false,
            nextArrow: false     
        });  
    }
    
    //Convert address tags to google map links - Copyright Michael Jasper 2011
    $('address').each(function () {
        var link = "<a href='http://maps.google.com/maps?q=" + encodeURIComponent( $(this).text() ) + "' target='_blank'>" + $(this).text() + "</a>";
        $(this).html(link);
    });
    
});

