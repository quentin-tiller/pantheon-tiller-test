var $ = jQuery.noConflict();
if (
  (jQuery(document).ready(function () {
    $(".news-events-tab ul.nav-tabs li a").click(function (e) {
      e.preventDefault();
      var o = $(this).attr("data-id");
      window.history.replaceState(null, null, "#" + o);
    }),
      $(function () {
        $("#down-page a").click(function () {
          return (
            $("body,html").animate({ scrollTop: $(document).height() }, 3500),
            !1
          );
        });
      }),
      $(".banner-right-btn a.blue-btn").hover(
        function () {
          $(".rotated-square").addClass("blue-btn-hover");
        },
        function () {
          $(".rotated-square").removeClass("blue-btn-hover");
        }
      ),
      $(".banner-right-btn a.green-btn").hover(
        function () {
          $(".rotated-square").addClass("green-btn-hover");
        },
        function () {
          $(".rotated-square").removeClass("green-btn-hover");
        }
      ),
      $(".inner-banner-wrap .inner-banner-btn a.btn")
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (e) {
          if (
            location.pathname.replace(/^\//, "") ===
              this.pathname.replace(/^\//, "") &&
            location.hostname === this.hostname
          ) {
            var o = $(this.hash);
            (o = o.length ? o : $("[name=" + this.hash.slice(1) + "]"))
              .length &&
              $("html, body")
                .stop()
                .animate(
                  {
                    scrollTop:
                      o.offset().top -
                      $(".inner-header").outerHeight(!0) -
                      $(".resources-form").outerHeight(!0),
                  },
                  1500,
                  function () {
                    o.offset().top !== $(window).scrollTop() &&
                      $("html, body")
                        .stop()
                        .animate(
                          {
                            scrollTop:
                              o.offset().top -
                              $(".inner-header").outerHeight(!0) -
                              $(".resources-form").outerHeight(!0),
                          },
                          1500
                        );
                  }
                );
          }
        });
    var e = 1;
    $(".countJump").on("click", function () {
      if (
        location.pathname.replace(/^\//, "") ===
          this.pathname.replace(/^\//, "") &&
        location.hostname === this.hostname
      ) {
        var o = $(this.hash);
        if ((o = o.length ? o : $("[name=" + this.hash.slice(1) + "]")).length)
          return (
            $("html, body")
              .stop()
              .animate(
                {
                  scrollTop:
                    o.offset().top -
                    $(".inner-header").outerHeight(!0) -
                    $(".resources-form").outerHeight(!0),
                },
                1e3,
                function () {
                  o.offset().top !== $(window).scrollTop() &&
                    $("html, body")
                      .stop()
                      .animate(
                        {
                          scrollTop:
                            o.offset().top -
                            $(".inner-header").outerHeight(!0) -
                            $(".resources-form").outerHeight(!0),
                        },
                        100
                      );
                }
              ),
            (e += 6) > 7
              ? $(".countJump").hide()
              : $(this).attr("href", "#scroll-" + e),
            !1
          );
      }
    });
    e = 1;
    $(".homecountJump").on("click", function (o) {
      if (
        (o.preventDefault(),
        location.pathname.replace(/^\//, "") ===
          this.pathname.replace(/^\//, "") &&
          location.hostname === this.hostname)
      ) {
        var t = $(this.hash);
        if ((t = t.length ? t : $("[name=" + this.hash.slice(1) + "]")).length)
          return (
            $("html, body")
              .stop()
              .animate(
                {
                  scrollTop:
                    t.offset().top - $(".inner-header").outerHeight(!0),
                },
                1e3,
                function () {
                  t.offset().top !== $(window).scrollTop() &&
                    $("html, body")
                      .stop()
                      .animate(
                        {
                          scrollTop:
                            t.offset().top - $(".inner-header").outerHeight(!0),
                        },
                        100
                      );
                }
              ),
            (e += 1) > 4
              ? $(".homecountJump").hide()
              : $(this).attr("href", "#home-scroll-" + e),
            !1
          );
      }
    }),
      stickTheHeader(),
      $(".enumenu_ul").responsiveMenu({
        menuIcon_text: "",
        onMenuopen: function () {},
      }),
      $("#myTab a, #mapTab a").on("click", function (e) {
        e.preventDefault(), $(this).tab("show");
      }),
      $(
        ".product-description-click, .content-with-columns-img, .fifty-fifty-bg-popup, .media-object-bg-popup, .open-content-click"
      ).magnificPopup({
        type: "image",
        closeOnContentClick: !0,
        mainClass: "mfp-img-mobile",
        image: { verticalFit: !0 },
      }),
      $(".wista-video").magnificPopup({
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: !1,
        fixedContentPos: !1,
      }),
      $(".vieo-open").magnificPopup({
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: !1,
        fixedContentPos: !1,
      }),
      $(".popup-modal").magnificPopup({
        type: "inline",
        preloader: !1,
        focus: "#username",
        modal: !0,
      }),
      $(".leadership-modal, .technology-modal").magnificPopup({
        type: "inline",
        overflowY: "scroll",
      }),
      $(".customers-carousel-wrap").slick({
        infinite: !0,
        slidesToShow: 6,
        slidesToScroll: 6,
        dots: !1,
        arrows: !0,
        marging: 0,
        fade: !1,
        autoplay: !0,
        responsive: [
          {
            breakpoint: 992,
            settings: {
              draggable: !0,
              centerMode: !1,
              slidesToShow: 4,
              slidesToScroll: 4,
            },
          },
          {
            breakpoint: 768,
            settings: {
              draggable: !0,
              centerMode: !1,
              slidesToShow: 3,
              slidesToScroll: 3,
            },
          },
          {
            breakpoint: 641,
            settings: {
              draggable: !0,
              centerMode: !1,
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
        ],
      }),
      $(".testimonials-wrap").slick({
        infinite: !0,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: !1,
        arrows: !1,
        marging: 0,
        fade: !1,
        autoplay: !0,
      }),
      $(".employees-testimonials-wrap").slick({
        infinite: !0,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: !1,
        arrows: !1,
        marging: 0,
        speed: 3e3,
        autoplaySpeed: 4e3,
        fade: !1,
        autoplay: !0,
      }),
      $(".labeled-carousel-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: ".labeled-carousel-nav ul",
        infinite: !0,
        fade: !1,
        draggable: !1,
        centerMode: !1,
        autoplay: !1,
        focusOnSelect: !0,
        dots: !1,
        arrows: !0,
        speed: 500,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              draggable: !0,
              centerMode: !1,
              slidesToShow: 1,
              arrows: !1,
            },
          },
        ],
      }),
      $(window).on("resize load", function () {
        $(".labeled-carousel-nav ul li").length <= 7 &&
          $(".labeled-carousel-nav ul").addClass("no-transform");
      }),
      $(".labeled-carousel-nav ul").slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        asNavFor: ".labeled-carousel-slider",
        infinite: !0,
        centerMode: !1,
        draggable: !1,
        centerPadding: "0",
        focusOnSelect: !0,
        dots: !1,
        arrows: !1,
        responsive: [
          { breakpoint: 768, settings: { slidesToShow: 4, arrows: !0 } },
          {
            breakpoint: 481,
            settings: { slidesToShow: 3, arrows: !0 },
          },
        ],
      }),
      $(".globe-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: !0,
        infinite: !0,
        asNavFor: ".globe-category-slider, .slider-logo-wrap",
        draggable: !0,
        centerMode: !1,
        autoplay: !1,
        dots: !1,
        responsive: [
          {
            breakpoint: 768,
            settings: { draggable: !0, centerMode: !1, slidesToShow: 1 },
          },
        ],
      }),
      $(window).on("resize load", function () {
        $(".globe-category-slider .globe-slider-list").length <= 5 &&
          $(".globe-category-slider").addClass("no-transform");
      }),
      $(".globe-category-slider").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: ".slider-logo-wrap, .globe-slider",
        dots: !1,
        infinite: !0,
        centerMode: !1,
        draggable: !1,
        variableWidth: !0,
        focusOnSelect: !0,
        dots: !1,
        arrows: !1,
        responsive: [
          {
            breakpoint: 1280,
            settings: {
              draggable: !0,
              variableWidth: !0,
              centerMode: !1,
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 991,
            settings: {
              draggable: !0,
              variableWidth: !0,
              centerMode: !1,
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 768,
            settings: {
              draggable: !0,
              centerMode: !1,
              variableWidth: !1,
              slidesToShow: 1,
            },
          },
        ],
      }),
      $(".slider-logo-wrap").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: ".globe-category-slider, .globe-slider",
        dots: !1,
        infinite: !0,
        draggable: !1,
        dots: !1,
        arrows: !1,
        responsive: [
          {
            breakpoint: 768,
            settings: { draggable: !0, centerMode: !1, slidesToShow: 1 },
          },
        ],
      }),
      $(function () {
        jQuery("img.svg").each(function () {
          var e = jQuery(this),
            o = e.attr("id"),
            t = e.attr("class"),
            s = e.attr("src");
          jQuery.get(
            s,
            function (s) {
              var i = jQuery(s).find("svg");
              void 0 !== o && (i = i.attr("id", o)),
                void 0 !== t && (i = i.attr("class", t + " replaced-svg")),
                (i = i.removeAttr("xmlns:a")),
                e.replaceWith(i);
            },
            "xml"
          );
        });
      }),
      $(".search-toggles .dashicons-search").click(function () {
        $(".search-main").toggleClass("active"),
          $("body").toggleClass("search-active");
      }),
      $("body").hasClass("search-results") &&
        $(".search-wrap .dashicons-search").trigger("click"),
      $(".search-toggles .dashicons-no-alt").click(function () {
        $(".search-main").removeClass("active"),
          $("body").removeClass("search-active");
      });

    //   NEW MOBILE MENU TOGGLE
    // Add a span to implement dropdown arrows
    $("#menu-header-menu li.mega-menu > a").append(
      '<span class="mega-indicator" data-has-click-event="true"></span>'
    );
    // Toggle class to show/hide mobile menu
    $(".mobile-menu-toggle").on("click", function () {
      $(".header-menu-main nav").toggleClass("mobile-menu-open");
      $("body").toggleClass("no-scroll");
    });

    $("#menu-header-menu li.mega-menu").on("click", function () {
      // Check if this li is active 
      if ($(this).hasClass("dropdown-active")) {
        return;
      } else {
        // remove current active then activate clicked li
        $(".dropdown-active").removeClass("dropdown-active");
        $(this).addClass("dropdown-active");
      }
    });

    $("#menu-header-menu li.mega-menu > a > span").on("click", function (e) {
      // set time out so it doesnt interfere with the function above
      setTimeout(function () {
        $(".dropdown-active").removeClass("dropdown-active");
      }, 100),
      // dont let the link work
        e.preventDefault();
    });
  }),
  $(".breadcrumb-lists").length)
) {
  var myHeight = $("header").outerHeight(!0),
    stickyTop = $(".breadcrumb-lists").offset().top - myHeight;
  $(window).on("scroll", function () {
    $(window).scrollTop() > stickyTop
      ? ($(".breadcrumb-lists").addClass("sticky"),
        $("body").addClass("breadcrumb-sticky"))
      : ($(".breadcrumb-lists").removeClass("sticky"),
        $("body").removeClass("breadcrumb-sticky"));
  });
}
if ($(".resources-form").length) {
  stickyTop = $(".resources-form").offset().top - $("header").outerHeight(!0);
  $(window).on("scroll", function () {
    $(window).scrollTop() > stickyTop
      ? ($(".resources-form").addClass("sticky"),
        $("body").addClass("resources-form-sticky"))
      : ($(".resources-form").removeClass("sticky"),
        $("body").removeClass("resources-form-sticky"));
  });
}

function stickTheHeader() {
  $("header").outerHeight();
  $(window).scrollTop() > $("header").outerHeight()
    ? $("body").addClass("stickHeader")
    : $("body").removeClass("stickHeader");
}

$(window).scroll(function () {
  stickTheHeader();
}),
  $(window).resize(function () {
    stickTheHeader();
  });
var speed = 0.5,
  parallax = $("[data-parallax]");
$(window).scroll(function () {
  parallax.length &&
    $("[data-parallax]").each(function () {
      var e,
        o = $(window).scrollTop(),
        t = $(this);
      $(window).scrollTop() > t.offset().top - $(window).height() &&
        ((e = o - t.offset().top),
        t.animate({ "background-position-y": -e / 10 + "px" }, 0, "linear"));
    });
}),
  (function (e) {
    e.fn.isOnScreen = function (o) {
      var t = this.outerHeight(),
        s = this.outerWidth();
      if (!s || !t) return !1;
      var i = e(window),
        a = { top: i.scrollTop(), left: i.scrollLeft() };
      (a.right = a.left + i.outerWidth()), (a.bottom = a.top + i.outerHeight());
      var n = this.offset();
      (n.right = n.left + s), (n.bottom = n.top + t);
      var r = {
        top: a.bottom - n.top,
        left: a.right - n.left,
        bottom: n.bottom - a.top,
        right: n.right - a.left,
      };
      return "function" == typeof o
        ? o.call(this, r)
        : r.top > 0 && r.left > 0 && r.right > 0 && r.bottom > 0;
    };
  })(jQuery),
  $(window).scroll(function () {
    $(".animation-box").each(function () {
      if ($(this).isOnScreen()) {
        $(this).addClass("onView");
        var e = $(this).find(".animation");
        e.length &&
          $(function () {
            var o = e,
              t = 0,
              s = window.setInterval(function () {
                t < o.length
                  ? o.eq(t++).addClass("onView")
                  : window.clearInterval(s);
              }, 200);
          });
      }
    });
  }),
  $(".animation-box").each(function () {
    if ($(this).isOnScreen()) {
      $(this).addClass("onView");
      var e = $(this).find(".animation");
      e.length &&
        $(function () {
          var o = e,
            t = 0,
            s = window.setInterval(function () {
              t < o.length
                ? o.eq(t++).addClass("onView")
                : window.clearInterval(s);
            }, 200);
        });
    }
  }),
  $(window).on("load", function () {
    if (window.location.hash) {
      var e = window.location.hash.substr(1);
      $("[data-id='" + e + "']").trigger("click");
    }
    setTimeout(function () {
      $(".support-content-col-block .content-with-columns-block-list").addClass(
        "onView"
      );
    }, 300),
      setTimeout(function () {
        $(".company-col-list-block .column-block-list").addClass("onView");
      }, 300);
  }),
  $(window).on("load", function () {
    $(".hs_resume input[type=file]").before(
      '<div class="uplo-sec"><p><a>Browse…</a><span class="file-msg"></span></p></div>'
    ),
      $(".hs_resume input[type=file]").change(function () {
        $(this).prev("p").clone();
        var e = $(this)[0].files[0].name;
        $(this).prev("p").text(e);
      }),
      $("body").on("change", ".hs_resume input[type=file]", function (e) {
        var o = e.target.files[0].name;
        $(".hs_resume .uplo-sec > p > .file-msg").replaceWith(o);
      }),
      $(".hs_cover_letter input[type=file]").before(
        '<div class="uplo-sec"><p><a>Browse…</a><span class="file-msg"></span></p></div>'
      ),
      $(".hs_cover_letter input[type=file]").change(function () {
        $(this).prev("p").clone();
        var e = $(this)[0].files[0].name;
        $(this).prev("p").text(e);
      }),
      $("body").on("change", ".hs_cover_letter input[type=file]", function (e) {
        var o = e.target.files[0].name;
        $(".hs_cover_letter .uplo-sec > p > .file-msg").replaceWith(o);
      });
  });

var a = 0,
  h = window.innerHeight;
$(window).scroll(function () {
  if ($(".counter").length) {
    var e = $(".counter").offset().top - h;
    0 === a &&
      $(window).scrollTop() > e &&
      ($(".counter-value").each(function () {
        var e = $(this),
          o = e.attr("data-count");
        $({ countNum: e.text() }).animate(
          { countNum: o },
          {
            duration: 7e3,
            easing: "swing",
            step: function () {
              e.text(Math.floor(this.countNum));
            },
            complete: function () {
              e.text(this.countNum);
            },
          }
        );
      }),
      (a = 1));
  }
}),
  $(function () {
    $(".search-submit").click(function () {
      $(".error").hide();
      var e = !1;
      if (($(".search-field").val().length < 1 && (e = !0), 1 == e)) return !1;
    });
  });
