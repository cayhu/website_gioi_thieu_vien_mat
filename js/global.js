$(document).ready(function() {
    $(".menu  li .menu-icon-2").click(function() {
        $(this).parent().parent().find('.dropdown-menu').toggle();
        if ($(this).hasClass("icon-plus") == 1) {
            $(this).addClass("icon-minus");
            $(this).removeClass("icon-plus");
        } else {
            $(this).removeClass("icon-minus");
            $(this).addClass("icon-plus");
        }
    });

    $(".navbar-toggler-left").click(function() {
        $("#navbar-header").addClass("menu_act");
        $(".menu-bg").addClass("act");
    });
    $(".menu-bg").click(function() {
        $("#navbar-header").removeClass("menu_act");
        $(".menu-bg").removeClass("act");
    });

    $('#to_top').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, "normal");
        return false;
    });

    $('.item_wrapper', $('#main-slider')).bxSlider({
        slideSelector: '.item',
        auto: true,
        autoStart: true,
        pause: 10000,
        minSlides: 1,
        maxSlides: 1,
        pager: true,
        nextText: "",
        prevText: "",
        nextSelector: ".next_btn",
        prevSelector: ".prev_btn",
        mouseDrag: true
    });
    $('.item-2 .owl-carousel').owlCarousel({
        loop: false,
        margin: 20,
        items: 1,
        responsive: {
            0: {
                items: 1
            },
            414: {
                items: 1
            },
            768: {
                items: 1
            },
            1024: {
                items: 1
            }
        }
    });
    $('.home6 .owl-carousel').owlCarousel({
        loop: false,
        margin: 20,
        items: 1,
        responsive: {
            0: {
                items: 3
            },
            414: {
                items: 3
            },
            768: {
                items: 5
            },
            1024: {
                items: 6,
            }
        }
    });
    $('.home8 .owl-carousel').owlCarousel({
        loop: false,
        margin: 20,
        items: 1,
        responsive: {
            0: {
                items: 3
            },
            414: {
                items: 3
            },
            768: {
                items: 3
            },
            1024: {
                items: 5
            }
        }
    });
    $('.home9 .owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        items: 1,
        URLhashListener: true,
        startPosition: 'URLHash',
        autoHeight: true,
        responsive: {
            0: {
                items: 1
            },
            414: {
                items: 1
            },
            768: {
                items: 1
            },
            1024: {
                items: 3
            }
        }
    });

    $('.tieu_bieu_box .owl-pre').owlCarousel({
        loop: false,
        margin: 20,
        items: 1,
        responsive: {
            0: {
                items: 1
            },
            414: {
                items: 2
            },
            768: {
                items: 2
            },
            1024: {
                items: 3
            }
        }
    });

    $('.tieu_bieu__box .owl-carousel').owlCarousel({
        loop: false,
        margin: 20,
        items: 1,
        responsive: {
            0: {
                items: 1
            },
            414: {
                items: 2
            },
            768: {
                items: 3
            },
            1024: {
                items: 3
            }
        }
    });

    $(".modal-clip").modalVideo({
        youtube: {
            controls: 0,
            nocookie: true
        }
    });
    var tab = window.location.hash.substring(1);
    if (tab != '') {
        $('.home9__box .tab').removeClass('active');
        $('.home9__box .' + tab).addClass('active');
    }
    $('.home9 .owl-carousel').on('changed.owl.carousel', function(event) {
        var current = event.item.index;
        var hash = $(event.target).find(".owl-item").eq(current).find(".item").attr('data-hash');
        $('.' + hash).addClass('active');
    });

    $('.home9 .owl-carousel').on('change.owl.carousel', function(event) {
        var current = event.item.index;
        var hash = $(event.target).find(".owl-item").eq(current).find(".item").attr('data-hash');
        $('.' + hash).removeClass('active');
    });

    $('#sync1-tab a').click(function(event) {
        $(this).find('img').addClass('active');
        var tabsync = window.location.hash.substring(1);
        if (tabsync != '') {
            $('.' + tabsync).removeClass('active');
            $(this).find('img').addClass('active');
        }
    });
    $('#tabimg li').click(function(e) {
        e.preventDefault();
        if ($(this).attr("class") == 'current') {
            return;
        } else {
            $('#tabimg li').removeClass('current');
            $(".tab-content").hide();
            $(this).addClass('current');
            $('#' + $(this).attr('data-tab')).fadeIn();
        }
    });

});
$(document).scroll(function() {
    var scoll_top = $(document).scrollTop();
    if (scoll_top >= 1) {
        $("header").addClass("menufix");
    } else {
        $("header").removeClass("menufix");
    }
});