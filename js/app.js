// var lazyLoadInstance = new LazyLoad({
// });

// thĂªm affix vĂ o header khi scroll
if (window.innerWidth > 767) {
    var affix = $('.header_menu');
    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            affix.addClass('affix');
        } else {
            affix.removeClass('affix');
        }
    });
}

// hien thi nut back to top 
var scroll = $('.to_top');
$(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
        scroll.addClass('scroll');
    } else {
        scroll.removeClass('scroll');
    }
});

// scroll to top
var btn = $('.to_top');
btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
});

// title btn
$('.owl-carousel button').prop('title', 'nav button');

// set height
if (window.innerWidth > 767) {
    var step_item = 0;
    $('.fmenu_height').each(function () {
        if (step_item < $(this).height()) {
            step_item = $(this).height();
        };
    });
    $('.fmenu_height').height(step_item);
}

if (window.innerWidth > 767) {
    var hstory_height = 0;
    $('.hstory_height').each(function () {
        if (hstory_height < $(this).height()) {
            hstory_height = $(this).height();
        };
    });
    $('.hstory_height').height(hstory_height);
}

// mb-menu modal
let menu_mobile = $(".custom_menu");
menu_mobile.css("display", "block");
$(".shadow, .mb_mini_close").click(function () {
    menu_mobile.removeClass("scaleDown");
    $('html').removeClass("stop");
    $(".mb_menu_btn").removeClass("on");
});
$(".mb_menu_btn").click(function () {
    $(".shadow").click();
    menu_mobile.addClass("scaleDown");
    $('html').addClass("stop");
    $(".mb_menu_btn").addClass("on");
});

// Fancybox.bind('[data-fancybox]', {
// });

// owlCarousel 
var nav_prev = `<svg width="16" height="34" viewBox="0 0 16 34" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14 2L2 17L14 32" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;
var nav_next = `<svg width="16" height="34" viewBox="0 0 16 34" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 32L14 17L2 2" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;

$('.h_tsay_slide').owlCarousel({
    loop: true,
    margin: 1,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    // navText: [nav_prev, nav_next],
    responsive: {
        0: {
            items: 1,
        },
    }
})

$('.h_doitac_slide').owlCarousel({
    loop: true,
    margin: 1,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    // navText: [nav_prev, nav_next],
    responsive: {
        0: {
            items: 2,
        },
        767: {
            items: 6,
        },
        1200: {
            items: 8,
        },
    }
})
// lazy 
document.addEventListener("touchstart", function () {
    $(".lazy_img").attr("src", function () {
        return $(this).attr("data-img");
    });
    $(".lazy_bg").attr("style", function () {
        return $(this).attr("data-bg");
    });
});
document.addEventListener("mouseover", function () {
    $(".lazy_bg").attr("style", function () {
        return $(this).attr("data-bg");
    });
    $(".lazy_img").attr("src", function () {
        return $(this).attr("data-img");
    });
});

// home banner slide 
var swiperContainer = document.querySelector(".home-banner .mySwiper");

var swiper = new Swiper(".mySwiper", {
    effect: "cube",
    speed: 1500,
    grabCursor: true,
    loop: true,
    autoplay: { delay: 5000 },
    pagination: {
        el: ".swiper_pagination",
        clickable: true,
    },
    cubeEffect: {
        shadow: false,
        slideShadows: false,
        // shadowOffset: 10,
        // shadowScale: 0.54,
    },
    on: {
        slideChangeTransitionStart: function () {
            swiperContainer.style.transform = "scale(0.8)";

            document.querySelectorAll(".text_content").forEach(text => {
                text.classList.remove("animate__animated", "animate__fadeInUp", "animate__fadeInLeft", "animate__fadeInRight");
                text.style.opacity = "0"; // Ẩn chữ khi chuyển slide
            });
        },
        slideChangeTransitionEnd: function () {
            swiperContainer.style.transform = "scale(1)";

            // Thêm class zoom vào hình ảnh
            document.querySelectorAll(".swiper-slide img").forEach(img => img.classList.remove("zoom"));
            let activeSlide = document.querySelector(".swiper-slide-active img");
            if (activeSlide) activeSlide.classList.add("zoom");

            // Thêm hiệu ứng cho chữ trong slide active
            let activeSlideText = document.querySelector(".swiper-slide-active");
            if (activeSlideText) {
                let line1 = activeSlideText.querySelector(".text_line1");
                let line2 = activeSlideText.querySelector(".text_line2");
                let line3 = activeSlideText.querySelector(".text_line3");

                if (line1) {
                    line1.classList.add("animate__animated", "animate__fadeInUp");
                    line1.style.opacity = "1";
                }
                if (line2) {
                    line2.classList.add("animate__animated", "animate__fadeInLeft");
                    line2.style.opacity = "1";
                }
                if (line3) {
                    line3.classList.add("animate__animated", "animate__fadeInRight");
                    line3.style.opacity = "1";
                }
            }
        }
    }
});
$(document).ready(function () {
    $('.img_zoom').addClass('zoom');
});

// background effect 
if ($("#parallax").length) {
    const parallax = document.getElementById("parallax");
    // Parallax Effect for DIV 1
    window.addEventListener("scroll", function () {
        let offset = window.pageYOffset;
        parallax.style.backgroundPositionY = offset * 0.7 + "px";
        // DIV 1 background will move slower than other elements on scroll.
    });
}

if ($("#parallax2").length) {
    const parallax2 = document.getElementById("parallax2");
    // Parallax2 Effect for DIV 1
    window.addEventListener("scroll", function () {
        let offset = window.pageYOffset;
        parallax2.style.backgroundPositionY = offset * 0.7 + "px";
        // DIV 1 background will move slower than other elements on scroll.
    });
}

if ($("#parallax3").length) {
    const parallax3 = document.getElementById("parallax3");
    // Parallax3 Effect for DIV 1
    window.addEventListener("scroll", function () {
        let offset = window.pageYOffset;
        parallax3.style.backgroundPositionY = offset * 0.7 + "px";
        // DIV 1 background will move slower than other elements on scroll.
    });
}

/////////////////////////////////////////// count down timer
// Set the date we're counting down to
var countDownDate2 = new Date(dateTime2).getTime();
console.log(countDownDate2);

// Update the count down every 1 second
var x2 = setInterval(function () {

    // Get today's date and time
    let now2 = new Date().getTime();

    // Find the distance between now2 and the count down date
    let distance2 = countDownDate2 - now2;

    // Time calculations for days, hours, minutes and seconds
    let days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
    let hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
    let seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    if (days2 < 10) $("#cd_day2").html("0" + days2);
    else $("#cd_day2").html(days2);
    if (hours2 < 10) $("#cd_hour2").html("0" + hours2);
    else $("#cd_hour2").html(hours2);
    if (minutes2 < 10) $("#cd_minute2").html("0" + minutes2);
    else $("#cd_minute2").html(minutes2);
    if (seconds2 < 10) $("#cd_second2").html("0" + seconds2);
    else $("#cd_second2").html(seconds2);
    // If the count down is finished, write some text
    if (distance2 <= 0) {
        clearInterval(x2);
        $("#cd_day2").html("00");
        $("#cd_hour2").html("00");
        $("#cd_minute2").html("00");
        $("#cd_second2").html("00");
    }
}, 1000);

// $(".nav-drop").on("pointerdown", function () {
//     let select = $("#type")[0]; // Lấy phần tử thô (DOM element)
//     select.showPicker(); // Chỉ hoạt động trên Chrome & Edge
// });

// $(".nav-drop").on("pointerdown touchstart", function (e) {
//     e.preventDefault(); // Ngăn hành vi mặc định của trình duyệt

//     let select = $("#type")[0]; // Lấy phần tử thô (DOM element)

//     if (select.showPicker) {
//         select.showPicker(); // Dành cho Chrome & Edge (Desktop + Android)
//     } else {
//         $("#type").focus(); // Dành cho Safari & Firefox
//     }
// });

$(".nav-drop").on("click touchend", function (e) {
    e.preventDefault(); // Ngăn hành vi mặc định (giúp tránh lỗi trên mobile)

    let select = $("#type")[0]; // Lấy phần tử thô (DOM element)

    // Kiểm tra nếu trình duyệt hỗ trợ showPicker
    if (select.showPicker) {
        select.showPicker(); // Chrome, Edge (Desktop + Android)
    } else {
        $("#type").focus().click(); // Safari, Firefox, iOS
    }
});

// product detail img
$(document).ready(function () {
    var owlMain_detail = $('.product_img_owl');
    var owlDot_detail = $('.product_dots_slide');

    $('.slider_close').click(function () {
        $('.slider_img_product').removeClass('active');
        $('html').removeClass('stop');
    })
    $('.slider_img_body').click(function (e) {
        if (e.target === e.currentTarget) {
            $('.slider_img_product').removeClass('active');
            $('html').removeClass('stop');
        }
    })

    // Khá»Ÿi táº¡o carousel chĂ­nh
    owlMain_detail.owlCarousel({
        items: 1, // Hiá»ƒn thá»‹ 1 áº£nh má»—i láº§n
        loop: false,
        margin: 10,
        nav: true, // Hiá»ƒn thá»‹ nĂºt Ä‘iá»u hÆ°á»›ng
        navText: [
            `<svg width="13" height="27" viewBox="0 0 13 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_3743_106)">
              <path d="M11.8184 1L1.182 13.5L11.8184 26" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </g>
              <defs>
              <clipPath id="clip0_3743_106">
              <rect width="13" height="27" fill="white" transform="matrix(-1 0 0 -1 13 27)"/>
              </clipPath>
              </defs>
              </svg>
              `,
            `<svg width="13" height="27" viewBox="0 0 13 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_3743_109)">
              <path d="M1.18164 26L11.818 13.5L1.18164 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </g>
              <defs>
              <clipPath id="clip0_3743_109">
              <rect width="13" height="27" fill="white"/>
              </clipPath>
              </defs>
              </svg>
              `,
        ],
        dots: false, // VĂ´ hiá»‡u hĂ³a dots cá»§a carousel chĂ­nh
        onChanged: syncDot, // Äá»“ng bá»™ dot khi carousel chĂ­nh thay Ä‘á»•i
    });

    // Khá»Ÿi táº¡o carousel dot item
    owlDot_detail.owlCarousel({
        items: 4, // Hiá»ƒn thá»‹ nhiá»u dot má»—i láº§n
        loop: false,
        margin: 15,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 3,
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
        // center: false,
    });

    // Khi carousel dot item Ä‘Æ°á»£c nháº¥p
    owlDot_detail.on('click', '.dot_item_detail', function (e) {
        console.log('123123');

        var index = $(this).parent().index();
        owlMain_detail.trigger('to.owl.carousel', [index, 300]); // Di chuyá»ƒn carousel chĂ­nh tá»›i dot item Ä‘Ă£ nháº¥n
        console.log(index);

    });

    // HĂ m Ä‘á»“ng bá»™ dot item vá»›i carousel chĂ­nh
    function syncDot(event) {
        var currentIndex = event.item.index;
        var dotFocus = owlDot_detail.find('.owl-item').eq(currentIndex).find('.dot_item_detail');
        owlDot_detail.trigger('to.owl.carousel', [currentIndex, 300]);
        $('.dot_item_detail').removeClass('focus');
        dotFocus.addClass('focus');
    }

    $('.show-image-array').click(function () {
        var index = $(this).data('index');
        owlMain_detail.trigger('to.owl.carousel', [index, 300]); // Di chuyá»ƒn carousel chĂ­nh tá»›i dot item Ä‘Ă£ nháº¥n
    })
});

// zoom image
const zoomer = document.querySelector(".zoomer");
const wrapImg = document.querySelectorAll(".zoomer.item");
// const result = document.querySelector(".zoomer .result");

const size = 2;

wrapImg.forEach((item) => {
    item.addEventListener("mousemove", function (e) {
        var result = item.querySelector(".result");
        result.classList.remove("hide");

        const img = item.querySelector("img");

        let x = (e.offsetX / this.offsetWidth) * 100;
        let y = (e.offsetY / this.offsetHeight) * 100;

        // move result
        let posX = e.pageX - zoomer.offsetLeft;
        let posY = e.pageY - zoomer.offsetTop;

        result.style.cssText = `
                  background-image: url(${img.src});
                  background-size: ${img.width * size}px ${img.height * size}px;
                  background-position : ${x}% ${y}%;
            `;
    });

    item.addEventListener("mouseleave", function (e) {
        var result = item.querySelector(".result");
        result.style = ``;
        result.classList.add("hide");
    });
});
// product detail img end

Fancybox.bind('[data-fancybox]', {
});

// statusbar 
var b = 0;
var sbar = $(".congtrinh");
var sbar1 = $(".contrinhbar1_status");
var sbar2 = $(".contrinhbar2_status");
var sbar3 = $(".contrinhbar3_status");
var sbar4 = $(".contrinhbar4_status");
$(document).ready(function () {
    $(window).scroll(function () {
        if (sbar.length != 0) {
            var cTop = $(".congtrinh").offset().top - window.innerHeight;
        }
        if (b == 0 && $(window).scrollTop() > cTop) {
            sbar1.removeClass("run");
            sbar2.removeClass("run");
            sbar3.removeClass("run");
            sbar4.removeClass("run");
            b = 1;
        }
    });
});

$(".circle_percent").each(function () {
    var $this = $(this),
        $dataV = $this.data("percent"),
        $dataDeg = $dataV * 3.6,
        $round = $this.find(".round_per");
    $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
    $this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
    $this.prop('Counter', 0).animate({ Counter: $dataV },
        {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
                $this.find(".percent_text").text(Math.ceil(now) + "%");
            }
        });
    if ($dataV >= 51) {
        $round.css("transform", "rotate(" + 360 + "deg)");
        setTimeout(function () {
            $this.addClass("percent_more");
        }, 1000);
        setTimeout(function () {
            $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
        }, 1000);
    }
});