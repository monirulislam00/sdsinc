$(document).ready(function () {
    "use strict";

    // Sticky area js
    $(".sticky-area").sticky({
        topspacing: 0,
    });
    function preloader() {
        if ($("#preloader").length) {
            $(window).on("load", function () {
                $("#preloader").fadeOut();
                $("#preloader").fadeOut("slow");
            });
        }
        console.log("ok");
    }
    // preloader();
    $(".carousel.owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        animateOut: "fadeOut",
        autoHeight: false,
        autoWidth: false,
        responsive: {
            0: {
                items: 1,
            },
        },
    });
    console.log("ok");
    // // ***********HEader & MENU bar********
    // /**
    //  * Easy selector helper function
    //  */
    // const select = (el, all = false) => {
    //     el = el.trim();
    //     if (all) {
    //         return [...document.querySelectorAll(el)];
    //     } else {
    //         return document.querySelector(el);
    //     }
    // };

    // /**
    //  * Easy event listener function
    //  */
    // const on = (type, el, listener, all = false) => {
    //     if (all) {
    //         select(el, all).forEach((e) => e.addEventListener(type, listener));
    //     } else {
    //         select(el, all).addEventListener(type, listener);
    //     }
    // };

    // /**
    //  * Easy on scroll event listener
    //  */
    // const onscroll = (el, listener) => {
    //     el.addEventListener("scroll", listener);
    // };

    // /**
    //  * Navbar links active state on scroll
    //  */
    // let navbarlinks = select("#navbar .scrollto", true);
    // const navbarlinksActive = () => {
    //     let position = window.scrollY + 200;
    //     navbarlinks.forEach((navbarlink) => {
    //         if (!navbarlink.hash) return;
    //         let section = select(navbarlink.hash);
    //         if (!section) return;
    //         if (
    //             position >= section.offsetTop &&
    //             position <= section.offsetTop + section.offsetHeight
    //         ) {
    //             navbarlink.classList.add("active");
    //         } else {
    //             navbarlink.classList.remove("active");
    //         }
    //     });
    // };
    // window.addEventListener("load", navbarlinksActive);
    // onscroll(document, navbarlinksActive);

    // /**
    //  * Scrolls to an element with header offset
    //  */
    // const scrollto = (el) => {
    //     let header = select("#header");
    //     let offset = header.offsetHeight;

    //     if (!header.classList.contains("header-scrolled")) {
    //         offset -= 10;
    //     }

    //     let elementPos = select(el).offsetTop;
    //     window.scrollTo({
    //         top: elementPos - offset,
    //         behavior: "smooth",
    //     });
    // };

    // /**
    //  * Mobile nav toggle
    //  */
    // on("click", ".mobile-nav-toggle", function (e) {
    //     select("#navbar").classList.toggle("navbar-mobile");
    //     this.classList.toggle("bi-list");
    //     this.classList.toggle("bi-x");
    // });

    // /**
    //  * Mobile nav dropdowns activate
    //  */
    // on(
    //     "click",
    //     ".navbar .dropdown > a",
    //     function (e) {
    //         if (select("#navbar").classList.contains("navbar-mobile")) {
    //             e.preventDefault();
    //             this.nextElementSibling.classList.toggle("dropdown-active");
    //         }
    //     },
    //     true
    // );

    // /**
    //  * Scrool with ofset on links with a class name .scrollto
    //  */
    // on(
    //     "click",
    //     ".scrollto",
    //     function (e) {
    //         if (select(this.hash)) {
    //             e.preventDefault();

    //             let navbar = select("#navbar");
    //             if (navbar.classList.contains("navbar-mobile")) {
    //                 navbar.classList.remove("navbar-mobile");
    //                 let navbarToggle = select(".mobile-nav-toggle");
    //                 navbarToggle.classList.toggle("bi-list");
    //                 navbarToggle.classList.toggle("bi-x");
    //             }
    //             scrollto(this.hash);
    //         }
    //     },
    //     true
    // );

    // /**
    //  * Scroll with ofset on page load with hash links in the url
    //  */
    // window.addEventListener("load", () => {
    //     if (window.location.hash) {
    //         if (select(window.location.hash)) {
    //             scrollto(window.location.hash);
    //         }
    //     }
    // });
    // // ***********HEader & MENU bar end********

    // //#main-slider

    // accordian;
    // $(".accordion-toggle").on("click", function () {
    //     $(this)
    //         .closest(".panel-group")
    //         .children()
    //         .each(function () {
    //             $(this).find(">.panel-heading").removeClass("active");
    //         });

    //     $(this).closest(".panel-heading").toggleClass("active");
    // });

    // // portfolio filter
    // $(window).load(function () {
    //     "use strict";
    //     var $portfolio_selectors = $(".portfolio-filter >li>a");
    //     var $portfolio = $(".portfolio-items");
    //     $portfolio.isotope({
    //         itemSelector: ".portfolio-item",
    //         layoutMode: "fitRows",
    //     });

    //     $portfolio_selectors.on("click", function () {
    //         $portfolio_selectors.removeClass("active");
    //         $(this).addClass("active");
    //         var selector = $(this).attr("data-filter");
    //         $portfolio.isotope({
    //             filter: selector,
    //         });
    //         return false;
    //     });
    // });

    // Contact form
    // var form = $('#main-contact-form');
    // form.submit(function (event) {
    //     event.preventDefault();
    //     var form_status = $('<div class="form_status"></div>');
    //     $.ajax({
    //         url: $(this).attr('action'),

    //         beforeSend: function () {
    //             form.prepend(form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn());
    //         }
    //     }).done(function (data) {
    //         form_status.html('<p class="text-success">' + data.message + '</p>').delay(3000).fadeOut();
    //     });
    // });

    $(".testimonial-slider").owlCarousel({
        margin: 30,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });

    // Show or hide the Bottom to Top button
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 800) {
            $(".scroll-top").fadeIn(100);
        } else {
            $(".scroll-top").fadeOut(200);
        }
    });
    // Animate the scroll to top
    $(".scroll-top").on("click", function (event) {
        event.preventDefault();

        $("html, body").animate(
            {
                scrollTop: 0,
            },
            200
        );
    });

    //Pretty Photo
    $("a[rel^='prettyPhoto']").prettyPhoto({
        social_tools: false,
    });
    // preloader js
});
