jQuery(window).on('load', function () {
    jQuery('body').impulse();
    endLoading;
});

jQuery.fn.impulse.default.tempo = 600;

jQuery(document).ready(function () {

    jQuery('.main-logo img').addClass('img-responsive');

    jQuery(window).resize(musicmacho_resize);
    
    musicmacho_resize();
    
    if(jQuery('#cssmenu ul li').hasClass('current_page_item')){
        jQuery('.current_page_item a').addClass('active');
    }

    if (jQuery('div').hasClass('MusicmachoWrap')) {
        jQuery('body').addClass('MusicmachoPages');
    } else {
        jQuery('body').removeClass('MusicmachoPages');
    }
    if (!jQuery('div').hasClass('MusicmachoWrap')) {

        jQuery('a[href^="#"]').on('click', function (e) {
            
            jQuery(document).on("scroll", onScroll);

            e.preventDefault();

            jQuery(document).off("scroll");

            jQuery('a').each(function () {
                jQuery(this).removeClass('active');
            })
            jQuery(this).addClass('active');

            var target = this.hash,
                menu = target;
            if (jQuery(target).offset()) {
                jQuery('html, body').stop().animate({
                    scrollTop: jQuery(target).offset().top
                }, 1500,'swing', function () {
                    window.location.hash = target;
                    jQuery(document).on("scroll", onScroll);
                });            
            }
        });
    }
});

function onScroll(event) {
    var scrollPos = jQuery(document).scrollTop();

    jQuery('#cssmenu a').each(function () {
        var currLink = jQuery(this);
        var refElement = jQuery(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            jQuery('#cssmenu ul li a').removeClass("active");
            currLink.addClass("active");
        } else {
            currLink.removeClass("active");
        }
    });
}
jQuery(window).scroll(function () {

    didScroll = true;

    if(!jQuery('nav').hasClass('musicmacho-header-fixed')) {
        if (jQuery(window).scrollTop() > 600) {
                jQuery('.MusicmachoNav').addClass('fixed-header');            
        } 
        else {
            jQuery('.MusicmachoNav').removeClass('fixed-header');
        }
    } 
    if (jQuery(window).scrollTop() > 10) {
        jQuery('body.MusicmachoPages .MusicmachoNav').addClass('fixed');
    } else {
        jQuery('body.MusicmachoPages .MusicmachoNav').removeClass('fixed');
    }
});

/* Start Menu */
(function ($) {
    var index = 0;
    $.fn.menumaker = function (options) {
        var cssmenu = jQuery(this),
            settings = jQuery.extend({
                title: "",
                breakpoint: 99999,
                format: "dropdown",
                sticky: false
            }, options);
        return this.each(function () {
            // cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
            jQuery("#menu-button").on('click', function () {
                var mainmenu = jQuery('#menu-main-menu');
                if (mainmenu.hasClass('open')) {
                    mainmenu.removeClass('open');
                } else {
                    mainmenu.addClass('open');
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    if (jQuery(this).siblings('ul').hasClass('open')) {
                        jQuery(this).siblings('ul').slideToggle(500, "easeInSine").removeClass('open');
                    } else {
                        jQuery(this).siblings('ul').slideToggle(500, "easeInSine").addClass('open');
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            resizeFix = function () {
                if (jQuery(window).width() > 99999) {
                    cssmenu.find('ul').show();

                }
                if (jQuery(window).width() <= 99999) {
                    cssmenu.find('ul').hide().removeClass('open');
                    var headerHtml;
                    jQuery('.header-wrap .col-sm-5').each(function (i) {
                        headerHtml = jQuery(this).html();
                        if (index >= 2) {
                            return false;
                        }
                        jQuery('.MobileMenu').append('<div class="header-wrap">' + headerHtml + '</div>');
                        index++;
                    });
                }
            };
            resizeFix();
            return jQuery(window).on('resize', resizeFix);
        });
    };
})(jQuery);
(function ($) {
    jQuery(document).ready(function () {
        jQuery(document).ready(function () {
            jQuery("#cssmenu").menumaker({
                title: "<span></span><span></span><span></span>",
                format: "multitoggle"
            });
            var foundActive = false,
                activeElement, linePosition = 0,
                width = 0,
                menuLine = jQuery("#cssmenu #menu-line"),
                lineWidth, defaultPosition, defaultWidth;
            jQuery("#cssmenu > ul > li").each(function () {
                if (jQuery(this).hasClass('current-menu-item')) {
                    activeElement = jQuery(this);
                    foundActive = true;
                }
            });
            if (foundActive != true) {
                activeElement = jQuery("#cssmenu > ul > li").first();
            }
            if (foundActive == true) {
                activeElement = jQuery("#cssmenu > ul > li").first();
            }
            defaultWidth = lineWidth = activeElement.width();
            if((activeElement).is(':empty')) {
                defaultPosition = linePosition = activeElement.position().left;
            }
            menuLine.css("width", lineWidth);
            menuLine.css("left", linePosition);
            jQuery("#cssmenu > ul > li").hover(function () {
                    activeElement = $(this);
                    lineWidth = activeElement.width();
                    linePosition = activeElement.position().left;
                    menuLine.css("width", lineWidth);
                    menuLine.css("left", linePosition);
                },
                function () {
                    menuLine.css("left", defaultPosition);
                    menuLine.css("width", defaultWidth);
                });
        });
        /** Set Position of Sub-Menu **/
        var wapoMainWindowWidth = jQuery(window).width();
        jQuery('#cssmenu ul ul li').mouseenter(function () {
            var subMenuExist = jQuery(this).find('.sub-menu').length;
            if (subMenuExist > 0) {
                var subMenuWidth = jQuery(this).find('.sub-menu').width();
                var subMenuOffset = jQuery(this).find('.sub-menu').parent().offset().left + subMenuWidth;
                if ((subMenuWidth + subMenuOffset) > wapoMainWindowWidth) {
                    jQuery(this).find('.sub-menu').removeClass('submenu-left');
                    jQuery(this).find('.sub-menu').addClass('submenu-right');
                } else {
                    jQuery(this).find('.sub-menu').removeClass('submenu-right');
                    jQuery(this).find('.sub-menu').addClass('submenu-left');
                }
            }
        });
    });
})(jQuery);
/*Menu end*/

/*Hide Header on on scroll down*/
var didScroll;
var lastScrollTop = 0;
var delta = 10;
var navbarHeight = jQuery('.MusicmachoNav').outerHeight();

setInterval(function () {
    if (didScroll) {
        musicmahco_hascrolled();
        didScroll = false;
    }
}, 690);

function musicmahco_hascrolled() {
    var st = jQuery(this).scrollTop();

    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta)
        return;
    lastScrollTop = st;
}

function musicmacho_resize() {
    if (jQuery(window).width() <= 99999) {
        jQuery('#cssmenu > ul').addClass('MobileMenu');
    } else {
        jQuery('#cssmenu > ul').removeClass('MobileMenu');
    }
}
(function (e) {
    e.fn.countdown = function (t, n) {
        function i() {
            eventDate = Date.parse(r.date) / 1e3;
            currentDate = Math.floor(e.now() / 1e3);
            if (eventDate < currentDate) {
                n.call(this);
                clearInterval(interval);
                AfterLaunch();
            }
            seconds = eventDate - currentDate;
            days = Math.floor(seconds / 86400);
            seconds -= days * 60 * 60 * 24;
            hours = Math.floor(seconds / 3600);
            seconds -= hours * 60 * 60;
            minutes = Math.floor(seconds / 60);
            seconds -= minutes * 60;
            days == 1 ? thisEl.find(".timeRefDays").text("day") : thisEl.find(".timeRefDays").text("days");
            hours == 1 ? thisEl.find(".timeRefHours").text("hour") : thisEl.find(".timeRefHours").text("hours");
            minutes == 1 ? thisEl.find(".timeRefMinutes").text("minute") : thisEl.find(".timeRefMinutes").text("minutes");
            seconds == 1 ? thisEl.find(".timeRefSeconds").text("second") : thisEl.find(".timeRefSeconds").text("seconds");
            if (r["format"] == "on") {
                days = String(days).length >= 2 ? days : "0" + days;
                hours = String(hours).length >= 2 ? hours : "0" + hours;
                minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
                seconds = String(seconds).length >= 2 ? seconds : "0" + seconds
            }
            if (!isNaN(eventDate)) {
                thisEl.find(".days").text(days);
                thisEl.find(".hours").text(hours);
                thisEl.find(".minutes").text(minutes);
                thisEl.find(".seconds").text(seconds)
            }
            else {
                alert("Invalid date. Example: 30 Tuesday 2013 15:50:00");
                clearInterval(interval)
            }
        }
        var thisEl = e(this);
        var r = {
            date: null
            , format: null
        };
        t && e.extend(r, t);

        i();
        var interval = setInterval(i, 1e3)
    }
})(jQuery);
jQuery(window).load(function(){
    jQuery('.preloader').delay(400).fadeOut(500);
});


var endLoading = (function() {
    var loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 100 } );
    setTimeout( function() {
        $('.square-loader').hide();
        $('body').css('overflow-y', 'visible');
        loader.hide();
    }, 3000 );
})();