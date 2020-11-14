/*
 Theme Name: Cargo Pifour - Logistic and Transportation HTML Template
 Theme URL: themewar.com/html/pifour/
 Author: ExpandTHeme
 Author URI: http://themeforest.net/user/expandtheme
 Description: Cargo Pifour
 Version: 1.0
 */

(function ($) {
    'use strict';

    //=========================
    // Revolution Slider
    //=========================
    if ($(".sliderSection").length > 0)
    {
        $('.tp-banner').revolution({
            delay: 9000,
            startwidth: 1140,
            startheight: 710,
            startWithSlide: 0,
            fullScreenAlignForce: "off",
            navigationType: "bullet",
            navigationArrows: "on",
            navigationStyle: "round",
            touchenabled: "on",
            onHoverStop: "off",
            navOffsetHorizontal: 0,
            navOffsetVertical: 20,
            shadow: 0,
            fullWidth: "off",
            fullScreen: "on",
            navigationVOffset: 35

        });
    }
    ;

    //========================
    // Flug dropdown
    //========================
    if ($('.currentFlg').length > 0) {
        $('.currentFlg').on('click', function () {
            $(this).toggleClass("active");
            $('.language > .flagList').slideToggle('slow');
        });
    }
    ;

    //=========================
    // Home1 Services Testmonial
    //=========================
    if ($('#sercarosel').length > 0) {
        $("#sercarosel").owlCarousel({
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    //=========================
    // Home3 Testmonial
    //=========================
    if ($('#testmH3Carowsel').length > 0) {
        $("#testmH3Carowsel").owlCarousel({
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    var owl = $("#testmH3Carowsel").data('owlCarousel');
    $('.slidePrev').on('click', function (e) {
        e.preventDefault();
        owl.prev();
    });
    $('.slideNext').on('click', function (e) {
        e.preventDefault();
        owl.next();
    });

    //=========================
    // Home1 Testmonial
    //=========================
    if ($('#testcarosel').length > 0) {
        $("#testcarosel").owlCarousel({
            items: 1,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
    }
    //===================================
    // Bootstrap collaps pluse minuse
    //===================================
    if ($('.collapse').length > 0) {
        $('.collapse').on('shown.bs.collapse', function () {
            $(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
        }).on('hidden.bs.collapse', function () {
            $(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
        });
    }
    $('.panelHeading a').on('click', function () {
        $('.panelHeading a').removeClass('active');
        $(this).addClass('active');
    });


    //=========================
    // Home1 Services Testmonial
    //=========================
    if ($('#clientCaro').length > 0) {
        $("#clientCaro").owlCarousel({
            items: 6,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 4
                },
                1200: {
                    items: 6
                }
            }
        });
    }
    //========================
    // Mobile Menu
    //========================
    if ($('.mobileMenu, .mobileMenu2').length > 0) {
        $('.mobileMenu, .mobileMenu2').on('click', function () {
            $(this).toggleClass('active');
            $('.mainnav > ul, .mainnav2 > ul').slideToggle('slow');
        });
        if ($(window).width() < 768)
        {
            $(".mainnav li.has-menu-items > a, .mainnav2 li.has-menu-items > a").on('click', function () {
                $(this).parent().toggleClass('active');
                $(this).parent().children('.sub-menu').slideToggle('slow');
                return false;
            });
        }
    }
    ;
    //=========================
    // Home1 Services Testmonial
    //=========================
    if ($('.testCaro').length > 0) {
        $(".testCaro").owlCarousel({
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    //=========================
    // Home1 Services Testmonial
    //=========================
    if ($('#sblogImgGall').length > 0) {
        $("#sblogImgGall").owlCarousel({
            items: 1,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
    }

    //=======================================================
    // Video Section
    //=======================================================
    var vid1 = document.getElementById("myVideo1");
    function playPause1() {
        if (vid1.paused) {
            vid1.play();
        } else {
            vid1.pause();
        }
    }
    if ($("#videoWrap1").length > 0)
    {
        $('#playVideos').on('click', function (e) {
            e.preventDefault();
            playPause1();
            if ($(this).hasClass('active'))
            {
                $(this).removeClass('active');
                vid1.pause();
            } else
            {
                $(this).addClass('active');
                vid1.play();
            }
        });
    }
    ;
    //=======================================================
    // Google map
    //=======================================================
    if ($('#map').length > 0) {
        var map;
        map = new GMaps({
            el: '#map',
            lat: 51.4584218,
            lng: -0.0813982,
            zoomControlOpt: {
                style: 'SMALL',
                position: 'TOP_LEFT'
            },
            scrollwheel: false,
            zoom: 16,
            zoomControl: false,
            panControl: false,
            streetViewControl: false,
            mapTypeControl: false,
            overviewMapControl: false,
            clickable: false
        });
        map.addMarker({
            lat: 51.4584218,
            lng: -0.0813982
        });
    }


    //=======================================================
    // magnificPopup
    //=======================================================
    if ($('a.popUp').length > 0) {
        $("a.popUp").magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }


    //===================================
    // Fixed Header
    //===================================
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 40)
        {
            $("header").addClass('fixedHeader');
        } else
        {
            $("header").removeClass('fixedHeader');
        }
    });

    //========================
    // Contact Submit
    //========================
    if ($("#contactForm").length > 0)
    {
        $("#contactForm").on('submit', function (e) {
            e.preventDefault();
            $("#con_submit").html('Processsing...');
            var con_name, con_lname, con_email, con_message, con_sub;

            if ($("#con_name").length > 0) {
                var con_name = $("#con_name").val();
            }
            if ($("#con_email").length > 0) {
                var con_email = $("#con_email").val();
            }
            if ($("#con_message").length > 0) {
                var con_message = $("#con_message").val();
            }
            if ($("#con_sub").length > 0) {
                var con_sub = $("#con_sub").val();
            }

            var required = 0;
            $(".required", this).each(function () {
                if ($(this).val() == '')
                {
                    $(this).addClass('reqError');
                    required += 1;
                } else
                {
                    if ($(this).hasClass('reqError'))
                    {
                        $(this).removeClass('reqError');
                        if (required > 0)
                        {
                            required -= 1;
                        }
                    }
                }
            });
            if (required === 0)
            {
                $.ajax({
                    type: "POST",
                    url: 'php/mail.php',
                    data: {con_name: con_name, con_email: con_email, con_message: con_message, con_sub: con_sub},
                    success: function (data)
                    {
                        $("#con_submit").html('Done!');
                        $("#contactForm input, #contactForm textarea").val('');
                    }
                });
            } else
            {
                $("#con_submit").html('Failed!');
            }

        });

        $(".required").on('keyup', function () {
            $(this).removeClass('reqError');
        });
    }

    //========================
    // Subscriptions 
    //========================
    if ($("#subscriptionsforms").length > 0)
    {
        $("#subscriptionsforms").on('submit', function (e) {
            e.preventDefault();
            var sub_email = $("#sub_email").val();
            $("#subs_submit").html('<i class="fa fa-spinner"></i>');
            if (sub_email == '')
            {
                $("#sub_email").addClass('reqError');
                $("#subs_submit").html('<i class="fa fa-warning"></i>');
            } else
            {
                $("#sub_email").removeClass('reqError');
                $.ajax({
                    type: "POST",
                    url: "php/subscribe.php",
                    data: {sub_email: sub_email},
                    success: function (data)
                    {
                        $("#subscriptionsforms input").val('');
                        $("#subs_submit").html('<i class="fa fa-thumbs-up"></i>');
                    }
                });
            }
        });
        $("#sub_email").on('keyup', function () {
            $(this).removeClass('reqError');
        });
    }


    //========================
    // Back To Top
    //========================
    if ($('#backToTop').length) {
        var scrollTrigger = 100, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#backToTop').addClass('showit');
                    } else {
                        $('#backToTop').removeClass('showit');
                    }
                };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#backToTop').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    //========================
    // Loader 
    //========================
    $(window).load(function () {
        if ($('.preloader').length > 0) {
            $('.preloader').delay(400).fadeOut('slow');
        }
    });
    //========================
    // Loader 
    //========================
    if ($('select').length > 0) {
        $('select').select2();
    }

    //========================
    // search icon
    //========================
    $('.headerSeacBtn').on('click', function () {
        $('.searchMe').fadeIn();
        return false;
    });
    $('.cluseSearch').on('click', function () {
        $('.searchMe').fadeOut();
        return false;
    });

    //=======================================================
    // Color Preset
    //=======================================================
    if ($(".colorPresetArea").length > 0)
    {
        var switchs = true;
        $(".gearBtn").on('click', function (e) {
            e.preventDefault();
            if (switchs)
            {
                $(this).addClass('active');
                $(".colorPresetArea").animate({'left': '0px'}, 400);
                switchs = false;
            } else
            {
                $(this).removeClass('active');
                $(".colorPresetArea").animate({'left': '-290px'}, 400);
                switchs = true;
            }
        });

        $("#patterns a").on('click', function (e) {
            e.preventDefault();
            var bg = $(this).attr('href');

            if ($(".boxed").hasClass('active'))
            {
                //alert(bg);
                $('#patterns a').removeClass('active');
                $(this).addClass('active');
                $('body').removeClass('pat1 pat2 pat3 pat4 pat5 pat6 pat7 pat8 pat9 pat10');
                $('body').addClass(bg);
            } else
            {
                alert('Please, active box layout First.');
            }

        });

        $(".layout").on('click', function (e) {
            e.preventDefault();
            var layout = $(this).attr('href');
            if (layout == 'wide')
            {
                $('body').removeClass('pat1 pat2 pat3 pat4 pat5 pat6 pat7 pat8 pat9 pat10');
            }
            $('.layout').removeClass('active');
            $(this).addClass('active');
            $("#layout").attr('href', 'css/lay_colors/' + layout + '.css');
        });

        $(".lightDark a").click(function (e) {
            e.preventDefault();
            var colorsch = $(this).attr('href');
            $('.lightDark a').removeClass('active');
            $(this).addClass('active');
            $("#lightDark").attr('href', 'css/lay_colors/' + colorsch + '.css');
        });

        $(".mainColors a").click(function (e) {
            e.preventDefault();
            var color = $(this).attr('href');
            $(".mainColors a").removeClass('active');
            $(this).addClass('active');
            $("#colorChem").attr('href', 'css/lay_colors/' + color + '.css');
        });
    }
    ;


})(jQuery);
