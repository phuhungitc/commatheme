App = {
    scrollfixed: function () {
        if (jQuery('#masthead.sticky-top').length) {
            jQuery(window).scroll(function () {
                var sticky = jQuery('#masthead.sticky-top'),
                    scroll = jQuery(window).scrollTop();
                if (scroll >= 100) {
                    sticky.addClass('fixed');
                }
                else if (scroll == 0) {
                    sticky.removeClass('fixed');

                }
            });
        }
    },
    jssorslider: function () {
        jssor_1_slider_init = function (id) {
            var $key = [];
            var extrude_replace = {
                $Duration: 800,
                x: -0.2,
                $Delay: 40,
                $Cols: 12,
                $During: {$Left: [0.4, 0.6]},
                $SlideOut: true,
                $Formation: $JssorSlideshowFormations$.$FormationStraight,
                $Assembly: 260,
                $Easing: {$Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad},
                $Opacity: 2,
                $Outside: true,
                $Round: {$Top: 0.5},
                $Brother: {
                    $Duration: 800,
                    x: 0.2,
                    $Delay: 40,
                    $Cols: 12,
                    $Formation: $JssorSlideshowFormations$.$FormationStraight,
                    $Assembly: 1028,
                    $Easing: {$Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad},
                    $Opacity: 2,
                    $Round: {$Top: 0.5},
                    $Shift: -200
                }
            };
            $key.push({extrude_replace: extrude_replace});
            var flutter_inside_in = {
                $Duration: 1200,
                x: 1,
                $Delay: 20,
                $Cols: 10,
                $Rows: 5,
                $Opacity: 2,
                $Clip: 15,
                $During: {$Left: [0.3, 0.7]},
                $Formation: $JssorSlideshowFormations$.$FormationStraightStairs,
                $Assembly: 260,
                $Easing: {$Left: $Jease$.$InOutExpo, $Clip: $Jease$.$InOutQuad},
                $Round: {$Top: 0.8}
            };
            $key.push({flutter_inside_in: flutter_inside_in});
            var clip_oblique_chess_out = {
                $Duration: 1200,
                x: -1,
                y: -1,
                $Cols: 6,
                $Rows: 6,
                $Opacity: 2,
                $Clip: 15,
                $During: {$Left: [0.2, 0.8], $Top: [0.2, 0.8], $Clip: [0, 0.2]},
                $SlideOut: true,
                $Formation: $JssorSlideshowFormations$.$FormationStraight,
                $ChessMode: {$Column: 15, $Row: 15},
                $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Clip: $Jease$.$Swing},
                $ScaleClip: 0.5
            };
            $key.push({clip_oblique_chess_out: clip_oblique_chess_out});
            var wave_in = {
                $Duration: 1500,
                y: -0.5,
                $Delay: 60,
                $Cols: 12,
                $Opacity: 2,
                $Formation: $JssorSlideshowFormations$.$FormationStraightStairs,
                $Easing: {$Top: $Jease$.$InWave, $Opacity: $Jease$.$Linear},
                $Round: {$Top: 1.5}
            };
            $key.push({wave_in: wave_in});
            var vertical_blind_stripe = {
                $Duration: 400,
                $Delay: 50,
                $Cols: 10,
                $Clip: 2,
                $Formation: $JssorSlideshowFormations$.$FormationStraight
            }
            $key.push({vertical_blind_stripe: vertical_blind_stripe});
            var $amina = [];
            if (jQuery('#' + id + ' .slide-item').length) {
                jQuery('#' + id + ' .slide-item').each(function (e) {
                    var $this = jQuery(this).data('amnslider');
                    jQuery.map($key, function ($k, $v) {
                        jQuery.map($k, function (k, v) {
                            if (v == $this) {
                                $amina.push(k);
                            }
                        });

                    });
                });
            }

            var jssor_1_options = {
                $AutoPlay: 1,
                $SlideEasing: $Jease$.$OutBack,
                $FillMode: 2,
                $PauseOnHover: 0,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: $amina,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$(id, jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1920;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
        if (jQuery('.slider_primary').length) {
            jQuery('.slider_primary').each(function () {
                jssor_1_slider_init(jQuery(this).data('slideid'));
            });

        }

    },
    scrolltop: function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 500)
                jQuery('#goTop').slideDown();
            else
                jQuery('#goTop').slideUp();
        });
        jQuery('#goTop').click(function () {
            jQuery('body,html').animate({scrollTop: 0}, 1500);
        });
    },
    menumobile: function () {
        if (jQuery('.menumobile .menu-arrow').length) {
            jQuery('.menumobile .menu-arrow').each(function () {
                jQuery(this).toggle(function () {
                        jQuery('.menumobile').attr('style', 'transform:translate3d(-200px,0,0);-webkit-transform:translate3d(-200px,0,0); transition: transform 0.5s ease');
                        jQuery('.all-element').attr('style', 'transform:translate3d(-200px,0,0);-webkit-transform:translate3d(-200px,0,0);transition: transform 0.5s ease');
                        jQuery(this).find('i').removeClass('fa-bars');
                        jQuery(this).find('i').addClass('fa-times');
                    },
                    function () {
                        jQuery('.menumobile').attr('style', 'transform:translate3d(0,0,0);-webkit-transform:translate3d(0,0,0);transition: transform 0.5s ease');
                        jQuery('.all-element').attr('style', 'transform:translate3d(0,0,0);-webkit-transform:translate3d(0,0,0);transition: transform 0.5s ease');
                        jQuery(this).find('i').removeClass('fa-times');
                        jQuery(this).find('i').addClass('fa-bars');
                    });
            });
        }
    },

};
jQuery(document).ready(function () {
    App.scrollfixed();
    // App.jssorslider();
    App.menumobile();
    App.scrolltop();
});