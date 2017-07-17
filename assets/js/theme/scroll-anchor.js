!function ($, global) {
    'use strict';

    $.extend(jQuery.easing, {
        omParabola: function (x) {
            return x * (2 - x);
        }
    });

    var $pageReloaded = global.performance && global.performance.navigation.type == 1;
    var $window = $(global);
    var $document = $(global.document);
    var $body = $('body');
    var mobileBreakpoint = 991;
    var adminbarSelector = '#wpadminbar';

    var isDesktop, navbarStickySelector, navbarIsSticky, navbarActiveSelector, $navbar;

    var defineVariables = function () {
        isDesktop = global.innerWidth > mobileBreakpoint;
        navbarStickySelector = isDesktop ? '.navbar-sticky' : '.navbar-mobile-sticky';
        navbarIsSticky = $(navbarStickySelector).length > 0;
        navbarActiveSelector = isDesktop ? '.wrapper-active .navbar-sticky' : '.wrapper-active-mobile .navbar-mobile-sticky';
        $navbar = $(navbarActiveSelector);
    };

    $window.resize(defineVariables);
    defineVariables();

    var animatedScroll = function (position, duration, newHref) {
        newHref = newHref || '';
        duration = duration || 0;

        $('html, body').stop(false, false).animate({scrollTop: position}, {
                duration: duration,
                easing: 'omParabola',
                complete: function () {
                    if (newHref !== '' && window.history && window.history.pushState) {
                        history.pushState("", document.title, newHref);
                    }
                }
            }
        );
    };


    var correctBrowserAnchorScroll = function () {
        $navbar = $(navbarActiveSelector);
        var $adminBar = $(adminbarSelector),
            navbarHeight;

        if (isDesktop) {
            navbarHeight = $navbar.length && ($navbar.data('secondaryHeight') || $navbar.data('primaryHeight') || $navbar.parent().outerHeight()) || 0;
        } else {
            navbarHeight = $navbar.length && ($navbar.data('mobileHeight') || $navbar.parent().outerHeight()) || 0;
        }

        var adminbarHeight = $adminBar.length && $adminBar.height() || $body.hasClass('admin-bar') && 32 || 0;
        var anchorPosition = $(location.hash).offset().top;
        var scrollPosition = anchorPosition - navbarHeight - adminbarHeight;
        animatedScroll(scrollPosition, 150);
    };

    if (location.hash !== '' && !$pageReloaded) {
        if ((navbarIsSticky && $navbar.length) || !navbarIsSticky) {
            $(function () {
                setTimeout(correctBrowserAnchorScroll, 1);
            });
        } else {
            $document.on('navbar-wrapper-active', correctBrowserAnchorScroll);
        }

        $document.on('fonts-active', correctBrowserAnchorScroll);
    }

    var getScrollDurationFn = function (maxDuration, coeff) {
        return function (x) {
            return (1 - Math.exp(-x * coeff)) * maxDuration;
        };
    };

    var MAX_SCROLL_DURATION = 700; // msec
    var SCROLL_DURATION_COEFF = 0.001;

    var getScrollDuration = getScrollDurationFn(MAX_SCROLL_DURATION, SCROLL_DURATION_COEFF);

    $(function () {
        var $adminBar = $(adminbarSelector);

        $document.on('click', 'a[href*="#"]:not([href="#"])', function () {
            var $this = $(this);

            if (!$this.parents('.vc_tta-panel-heading,.vc_tta-tabs-container,.vc_pagination').length) {

                $navbar = $(navbarActiveSelector);

                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash),
                        href = this.href,
                        navbarHeight;

                    if (isDesktop) {
                        navbarHeight = $navbar.length && ($navbar.data('secondaryHeight') || $navbar.data('primaryHeight') || $navbar.parent().outerHeight()) || 0;
                    } else {
                        navbarHeight = $navbar.length && ($navbar.data('mobileHeight') || $navbar.parent().outerHeight()) || 0;
                    }

                    var adminbarHeight = $adminBar.length && $adminBar.height() || 0;

                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        var scrollPosition = target.offset().top - navbarHeight - adminbarHeight;
                        var scrollDelta = Math.abs($window.scrollTop() - scrollPosition);
                        //var scrollDuration = 300 + (scrollDelta / 60);
                        var scrollDuration = getScrollDuration(scrollDelta);

                        if ($this.hasClass('unfocus')) {
                            $this.blur();
                        }

                        animatedScroll(scrollPosition, scrollDuration, href);

                        return false;
                    }
                }
            }
        });
    });

}(jQuery, window);